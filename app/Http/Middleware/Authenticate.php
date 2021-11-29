<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Closure;

class Authenticate extends Middleware
{
    const AUTH_ERROR = 'authentication_error';

    public function handle($request, Closure $next, ...$guards)
    {
        if ($this->authenticate($request, $guards) === self::AUTH_ERROR) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Unauthorized',
                ],
                \Illuminate\Http\Response::HTTP_UNAUTHORIZED
            );
        }

        return $next($request);
    }

    protected function authenticate($request, array $guards)
    {
        if (empty($guards)) {
            $guards = [null];
        }

        foreach ($guards as $guard) {
            if ($this->auth->guard($guard)->check()) {
                return $this->auth->shouldUse($guard);
            }
        }

        return self::AUTH_ERROR;
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
