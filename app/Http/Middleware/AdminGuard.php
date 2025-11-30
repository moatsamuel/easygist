<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //check if someone that send the request is not an admin or has a status of blocked abort their request with the right status code
        if(!$request->user() || $request->user()->role != "admin" || $request->user()->status != "active"){
            return abort(403, "Oga, you no be admin now");
        }

        return $next($request);
    }
}
