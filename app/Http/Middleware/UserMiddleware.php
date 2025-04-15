<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\UserRole; // Adjust the namespace to match the actual location of UserRole

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(!\Illuminate\Support\Facades\Auth::check() || \Illuminate\Support\Facades\Auth::user()->role != UserRole::User){
            return redirect()->route("home")->with('error', 'You do not have admin access.');
        }

        return $next($request);
    }
}
