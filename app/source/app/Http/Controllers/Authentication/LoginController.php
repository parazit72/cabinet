<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Jobs\SendNewDeviceEventEmailJob;
use App\Models\AuthLog;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class LoginController extends Controller
{

    public function login(Request $request): JsonResponse
    {

        $this->validation($request);
        $user = $this->getUserInfo($request);
        $this->checkUserStatus($user);
        $this->Authentication($user, $request);
        $device = $this->isKnownDevice($request, $user);
        // $this->twoStepVerification($request, $user, $device);
        $ddcToken = $this->setUserDevice($request, $user, $device);
        $user->verificationCodes()->delete();
        $user->failed_login_attempts = 0;
        $token = $user->createToken('authToken')->plainTextToken;
        $user->last_login_at = Carbon::now();
        $user->save();
        $this->successfulLoginLog($user, $request, $ddcToken);

        return response()->json([
            'api_token' => $token,
        ])->cookie($this->getDdcCookie($user->username), $ddcToken, 43200, '/', null, true, true, true, 'Strict');
    }





    public function logout(Request $request)
    {


        try {
            Authlog::create(
                [
                    'email'     => Auth::user()->email ?? '',
                    'action'       => 'logged-out',
                    'request_data' =>
                    [
                        'ip_simple'       => $request->ip(),
                        'ip_behind_proxy' => $request->server('HTTP_CF_CONNECTING_IP') ?? $request->server('HTTP_AR_REAL_IP') ?? $request->server('REMOTE_ADDR') ?? '',
                        'location'        => $request->server('HTTP_CF_IPCOUNTRY') ?? $request->server('HTTP_AR_REAL_COUNTRY') ?? '',
                        'device'          => $request->header('User-Agent') ?? '',
                        'host'            => $request->server('HTTP_HOST') ?? '',
                        'ddc'             => $request->cookie($this->getDdcCookie(Auth::user()->email)) ?? '',
                    ]
                ]
            );
        } catch (\Exception $exception) {
            Log::error($exception);
        }

        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }

    private function validation(Request $request): void
    {
        $request->validate([
            'email'    => 'required|string|email',
            'password' => 'required|string',
        ]);
    }

    private function getUserInfo(Request $request)
    {
        $user = User::where('email', $request->email)
            ->whereIn('type', ['admin'])
            ->first();

        if (!$user) {
            $this->unsuccessfullyLoginLog($request);
            throw new AuthenticationException();
        } else {
            return $user;
        }
    }

    private function Authentication($user, Request $request): void
    {
        $hash = Hash::check($request->password, $user->password);
        if (!$hash) {
            $this->unsuccessfullyLoginLog($request);
            $this->blockUser($request, $user);
            throw new AuthenticationException();
        }
    }

    private function twoStepVerification(Request $request, $user, $device)
    {
        if (!$device) {
            $device = [
                'user_agent'      => $request->header('User-Agent'),
                'username'        => $user->username,
                'email'           => $user->email,
                'ip'              => $request->ip(),
                'ip_behind_proxy' => $request->server('HTTP_CF_CONNECTING_IP') ?? $request->server('HTTP_AR_REAL_IP') ?? $request->server('REMOTE_ADDR') ?? '',
                'last_login_at'   => Carbon::now(),
                'location'        => $request->server('HTTP_CF_IPCOUNTRY') ?? $request->server('HTTP_AR_REAL_COUNTRY') ?? 'Unknown',
            ];

            if (!$request->code) {
                $code = $this->generateVerificationCode($user);
                SendNewDeviceEventEmailJob::dispatch($device, $user, $code);
                abort(
                    response()->json([
                        'must_verify' => true,
                        'message'     => ['error' => ['We have sent an verification code to your email. ', 'Please check your email and enter the code.']],
                    ], 200)
                );
            }
            if ($request->code) {
                $request->validate([
                    'email' => 'required|string|max:64',
                    'password' => 'required|string',
                    'code'     => 'required|string|max:64',
                ]);
                $verificationCode = ($user->verificationCodes()->where('code', $request->code)->first());
                if (!$verificationCode) {
                    $this->unsuccessfullyLoginLog($request);
                    $this->blockUser($request, $user);

                    abort(
                        response()->json([
                            'must_verify' => true,
                            'message'     => ['error' => ['Please enter the correct verification code.']],
                        ], 200)
                    );
                }
                if (Carbon::make($verificationCode->expired_at) < Carbon::now()) {
                    $code = $this->generateVerificationCode($user);
                    SendNewDeviceEventEmailJob::dispatch($device, $user, $code);
                    abort(response()->json([
                        'must_verify' => true,
                        'message'     => ['error' => [
                            'Verification code has expired. ',
                            'We have sent a new verification code to your email. ',
                            'Please check your email and enter the code.'
                        ]],
                    ], 200));
                }
            }
        }
    }

    private function checkUserStatus($user)
    {
        if ($user->status !== 'enabled') {
            abort(response()->json([
                'message' => ['error' => ['Your account has been deactivated', 'Please contact the administrator.']],
            ], 401));
        }
    }

    private function isKnownDevice(Request $request, $user)
    {
        $device = $user->devices()->where('device_id', $request->cookie($this->getDdcCookie($user->username)))->first();
        if ($device) {
            return $device;
        }

        return false;
    }

    private function getDdcCookie($username): string
    {
        return 'ddc-' . substr(md5($username), 0, 10);
    }

    private function setUserDevice(Request $request, $user, $device)
    {

        // Set the device identifier in a cookie
        $ddcToken = Str::random(32);
        $newDevice = [
            'device_id'       => $ddcToken,
            'user_agent'      => $request->header('User-Agent'),
            'username'        => $user->username,
            'email'           => $user->email,
            'ip'              => $request->ip(),
            'ip_behind_proxy' => $request->server('HTTP_CF_CONNECTING_IP') ?? $request->server('HTTP_AR_REAL_IP') ?? $request->server('REMOTE_ADDR') ?? '',
            'last_login_at'   => Carbon::now(),
            'location'        => $request->server('HTTP_CF_IPCOUNTRY') ?? $request->server('HTTP_AR_REAL_COUNTRY') ?? 'Unknown',
            'status'          => 'active',
        ];
        if ($device) {
            $device->update($newDevice);
        } else {
            $user->devices()->create($newDevice);
        }
        return $ddcToken;
    }


    private function unsuccessfullyLoginLog(Request $request)
    {
        AuthLog::create(
            [
                'email'     => $request->email ?? '',
                'module'       => 'login',
                'action'       => 'login-failed',
                'request_data' =>
                [
                    'ip_simple'       => $request->ip(),
                    'ip_behind_proxy' => $request->server('HTTP_CF_CONNECTING_IP') ?? $request->server('HTTP_AR_REAL_IP') ?? $request->server('REMOTE_ADDR') ?? '',
                    'location'        => $request->server('HTTP_CF_IPCOUNTRY') ?? $request->server('HTTP_AR_REAL_COUNTRY') ?? '',
                    'device'          => $request->header('User-Agent') ?? '',
                    'host'            => $request->server('HTTP_HOST') ?? '',
                    'ddc'             => $request->cookie($this->getDdcCookie($request->email)) ?? '',

                ]
            ]
        );
    }

    private function successfulLoginLog($user, $request, $ddcToken)
    {
        try {
            Authlog::create(
                [
                    'email'     => $user->email ?? '',
                    'action'       => 'logged-in',
                    'request_data' =>
                    [
                        'ip_simple'       => $request->ip(),
                        'ip_behind_proxy' => $request->server('HTTP_CF_CONNECTING_IP') ?? $request->server('HTTP_AR_REAL_IP') ?? $request->server('REMOTE_ADDR') ?? '',
                        'location'        => $request->server('HTTP_CF_IPCOUNTRY') ?? $request->server('HTTP_AR_REAL_COUNTRY') ?? '',
                        'device'          => $request->header('User-Agent') ?? '',
                        'host'            => $request->server('HTTP_HOST') ?? '',
                        'ddc'             => $ddcToken ?? $request->cookie($this->getDdcCookie($user->email)) ?? '',
                    ]
                ]
            );
        } catch (\Exception $exception) {
            Log::error($exception);
        }
    }

    private function blockUser(Request $request, $user)
    {
        $user->failed_login_attempts = $user->failed_login_attempts + 1;
        $user->save();
        if ($user->failed_login_attempts >= 5 && $user->status != 'blocked') {
            $user->status = 'blocked';
            $user->save();
            $user->tokens()->delete();

            //@todo send email to user
            //$this->sendEmail($request, $hash, $user);


            try {
                AuthLog::create(
                    [
                        'module'    => 'login',
                        'email'  => $user->email ?? '',
                        'action'    => 'blocked',
                        'request_data' =>
                        [
                            'ip_simple'       => $request->ip(),
                            'ip_behind_proxy' => $request->server('HTTP_CF_CONNECTING_IP') ?? $request->server('HTTP_AR_REAL_IP') ?? $request->server('REMOTE_ADDR') ?? '',
                            'location'        => $request->server('HTTP_CF_IPCOUNTRY') ?? $request->server('HTTP_AR_REAL_COUNTRY') ?? '',
                            'device'          => $request->header('User-Agent'),
                            'host'            => $request->server('HTTP_HOST') ?? '',
                            'ddc'             => $request->cookie($this->getDdcCookie($user->email)) ?? '',
                        ]
                    ]
                );
            } catch (\Exception $exception) {
                Log::error($exception);
            }
        }
    }


    private function generateVerificationCode($user): string
    {
        $code = Str::random(3) . '-' . rand(100000, 999999);
        $user->verificationCodes()->create([
            'code' => $code,
            'expired_at' => Carbon::now()->addMinutes(3)
        ]);
        return $code;
    }
}
