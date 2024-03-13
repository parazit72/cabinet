<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\PersonalAccessToken;


class InactiveTokenMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $token = PersonalAccessToken::findToken($request->bearerToken());
        if ($token->expires_at != null) {
            if ($token->expires_at < Carbon::now()) {
                $token->delete();
                throw new AuthenticationException();
            }
        }


        $activationDuration = 90;

        if ($user && $token) {
            $expiration = Carbon::now()->addMinutes($activationDuration);
            $token->expires_at = $expiration;
            $token->save();
        }

        return $next($request);
    }
}
