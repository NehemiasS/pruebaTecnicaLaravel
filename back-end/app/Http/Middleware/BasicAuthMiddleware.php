<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BasicAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd([
        //     'user' => $request->getUser(),
        //     'password' => $request->getPassword()
        // ]);

        $user = $request->getUser();
        $password = $request->getPassword();

        if ($user !== 'admin' || $password !== 'secret') {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
