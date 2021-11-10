<?php

namespace App\Http\Controllers;

use App\course;
use App\track;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    /**
     * HomeController constructor.
     */
    public function __construct()
    {

    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     * Home page.
     */
    public function index()
    {
        // get count of courses.
        $countOfCourses = course::count();
        // get count of free courses
        $countOfFreeCourses = course::where('status',0)->count();
        // count of users
        $countOfUsers = User::where('admin',0)->count();
        // get count of track
        $countOfTrack = track::count();
        // user courses
        $userCourses = User::findorfail(1)->courses;
        //tracks with courses
        $tracks = track::with('courses')->orderBy('id','desc')->get();
        // get tracks with name and id
        $tracksname = track::all()->pluck('name','id');
        // get famous tracks ids
        $famous_tracks_ids = course::pluck('track_id')->countBy()->sort()->reverse()->keys()->take(10);

        // get famous tracks by largest track including largest number of courses
        $famous_tracks = track::withCount('courses')->whereIn('id',$famous_tracks_ids)->orderBy('courses_count','desc')->get();

        return view('website.home',compact('countOfCourses','countOfFreeCourses','countOfUsers','countOfTrack','userCourses','tracks','tracksname','famous_tracks'));
    }




}
