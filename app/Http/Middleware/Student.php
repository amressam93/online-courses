<?php

namespace App\Http\Middleware;

use Closure;

class Student
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();     // Authenticated User

        if($user->admin == 0)
        {
            return $next($request);
        }
        else
        {
            return abort(404);
        }
    }
}
