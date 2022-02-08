<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccessCourseLessons
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

        $course_id = $request->courseId;

        if(!in_array($course_id,Auth::user()->courses->pluck('id')->toArray()))
        {
            return response()->view('access_restricted');

        }

        return $next($request);
    }
}
