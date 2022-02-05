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

        //tracks with courses
        $tracks = track::with('courses')->orderBy('id','desc')->get();
        // get tracks with name and id
        $tracksname = track::all()->pluck('name','id');

        // get famous tracks ids
        $famous_tracks_ids = course::pluck('track_id')->countBy()->sort()->reverse()->keys()->take(10);

        // get famous tracks including largest number of courses inside track.
        $famous_tracks = track::withCount('courses')->whereIn('id',$famous_tracks_ids)->orderBy('courses_count','desc')->get();

        if(Auth::check())
        {
            $auth_user = auth()->user();

            // user courses
            $userCourses = $auth_user->courses;

            // get all courses where user enrolled in this courses
            $user_course_ids = $auth_user->courses()->pluck('id');    // 38,39,48

            // get all tracks where user enrolled in this tracks
            $user_tracks_ids = $auth_user->tracks()->pluck('id');   // 12,15,1

            // recommended courses
            $recommended_courses = course::whereIn('track_id',$user_tracks_ids)->whereNotIn('id',$user_course_ids)->get();


            return view('website.home',compact('countOfCourses','countOfFreeCourses','countOfUsers','countOfTrack','userCourses','tracks','tracksname','famous_tracks','recommended_courses'));
        }

        else
        {
            return view('website.home',compact('countOfCourses','countOfFreeCourses','countOfUsers','countOfTrack','tracks','tracksname','famous_tracks'));
        }


    }




}
