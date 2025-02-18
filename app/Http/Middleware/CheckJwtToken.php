<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class CheckJwtToken
{
    public function handle($request, Closure $next)
    {
        try {
            if (!$request->hasHeader('Authorization')) {
                return redirect('login');
            }

            $user = JWTAuth::parseToken()->authenticate();

            if (!$user) {
                return redirect('login');
            }

        } catch (TokenExpiredException $e) {
            return redirect('login')->with('message', 'Token has expired');
        } catch (TokenInvalidException $e) {
            return redirect('login')->with('message', 'Invalid token');
        } catch (\Exception $e) {
            return redirect('login')->with('message', 'Token not found');
        }

        return $next($request);
    }
}
