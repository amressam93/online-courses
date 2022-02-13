<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
            $auth_user = auth()->user();

            $user_courses = $auth_user->courses;

            $tracks = $auth_user->tracks;

            return view('website.my_courses',compact('user_courses','tracks'));
    }


}
