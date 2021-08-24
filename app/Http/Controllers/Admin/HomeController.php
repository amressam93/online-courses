<?php

namespace App\Http\Controllers\Admin;

use App\course;
use App\Http\Controllers\Controller;
use App\Quiz;
use App\track;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tracks = track::orderBy('id','desc')->limit(5)->get();
        $courses = course::orderBy('id','desc')->limit(5)->get();

        return view('admin.dashboard',compact('tracks','courses'));
    }
}
