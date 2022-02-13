<?php

namespace App\Http\Controllers;

use Alaouy\Youtube\Facades\Youtube;
use App\course;
use DateInterval;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;

class CourseController extends Controller
{


    public function index($slug,$id)
    {
        $course = course::where('slug',$slug)->first();

        //return $course->videos->first()->link;die();

        if($course)
            return view('website.course',compact('course'));
        return abort('404');
    }


    public function enroll_course($slug,$id)
    {
        $course = course::where('slug',$slug)->where('id',$id)->first();

        $auth_user = auth()->user();

        $track = $course->track;

        $auth_user->tracks()->syncWithoutDetaching([$track->id]);

        $auth_user->courses()->attach($course);

        return redirect()->route('single_course',['slug' => $course->slug,'id' => $course->id])->with('success-enroll',new HtmlString('You have Successfully enrolled for <strong>' . $course->title . '</strong>'.'Course'));
    }



    public function courseLessons($slug,$courseId)
    {
        $user = auth()->user();
        $quizzes_ids = [];

       foreach ($user->quizzes as $quiz)
       {
           $quizzes_ids[] = $quiz->id;
       }

        $course = course::where('slug',$slug)->first();

        return view('website.course_lesson',compact('course','quizzes_ids'));
    }




    public function getDuration($url)
    {
        $jsonData = Youtube::getVideoInfo('D4ny-CboZC0');
        $videoDuration = $jsonData->contentDetails->duration;
        $duration = new DateInterval($videoDuration);
        $channelTitle = $jsonData->snippet->channelTitle;
        $channelId = $jsonData->snippet->channelId;
        $views = $jsonData->statistics->viewCount;
        $description = $jsonData->snippet->description;
    }






}
