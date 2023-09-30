<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class AutoLoginMiddleware
{

    public function handle(Request $request, Closure $next) : Response
    {
        if($request->header('X-WebView') === 'ReactNative'){
            session(['is_webview' => true]);
        }

        if ($request->has('token')) {
           $token = $request->input('token');

            $tk = PersonalAccessToken::findToken($token);

            if ($tk) {
                $user = $tk->tokenable()->first();
                if ($user) {
                    Auth::login($user);

                    return $next($request);
                }
            }
        }

        return $next($request);

    }
}
