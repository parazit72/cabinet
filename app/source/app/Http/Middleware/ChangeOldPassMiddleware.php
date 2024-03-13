<?php

namespace app\Http\Middleware;

use App\InferaStructures\Helpers\OldPass;
use App\Panels\Admin\Models\AdminUser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;


class ChangeOldPassMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        $passIsNew = false;
        try {
            if (Auth::check()) {
                $user = Auth::user();
                if ($user->last_change_password_at) {
                    $lastChangePassword = Carbon::parse($user->last_change_password_at);
                    $now = Carbon::now();
                    $diff = $lastChangePassword->diffInDays($now);
                    if ($diff < 45) {
                        $passIsNew = true;
                    }
                }

                if ($user->must_change_password) {
                    $passIsNew = false;
                }

                if (!$passIsNew) {
                    return response()->json([
                        'status'   => 'error',
                        'message'  => ['error' => ['Your password has expired, please change your password now.']],
                        'redirect' => '/userprofile/create-edit?id=1',
                    ], Response::HTTP_FORBIDDEN);
                }
            }
        } catch (\Exception $exception) {
            Log::error($exception);
        }

        return $next($request);
    }
}
