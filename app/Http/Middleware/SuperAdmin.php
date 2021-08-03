<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdmin
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
        // amressam18393@gmail.com // super admin [owner website]

        $user = auth()->user();

        if(strtolower($user->email) == 'amressam18393@gmail.com')
        {
            return $next($request);
        }
        return abort(404);
    }
}
