<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidatePasswordResetEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Only check for authenticated users
        if ($request->user()) {
            $requestedEmail = $request->input('email');
            $userEmail = $request->user()->email;

            // Compare emails case-insensitively
            if (strtolower($requestedEmail) !== strtolower($userEmail)) {
                return response()->json([
                    'message' => 'You can only request password reset for your own account'
                ], 403);
            }
        }

        return $next($request);
    }
}
