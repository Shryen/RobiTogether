<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Checking if user logged in
        if (!Auth::check()) {
            return redirect('/');
        }
        // if logged in store data in a variable to get name
        $admin = Auth::user();
        // if name is not admin then cannot access page redirect to home page
        if ($admin->name != "admin") {
            return redirect('/');
        }
        // if admin let him do what he wants
        return $next($request);
    }
}
