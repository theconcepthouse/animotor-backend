<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class AutoLoginRequiredMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
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

        if(\auth()->check()){
            return $next($request);
        }else{
            return redirect()->route('login');
        }
    }
}
