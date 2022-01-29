<?php

namespace App\Http\Controllers;

use Alaouy\Youtube\Facades\Youtube;
use App\course;
use DateInterval;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index($slug,$id)
    {
        $course = course::where('slug',$slug)->first();

        //return $course->videos->first()->link;die();

        return view('website.course',compact('course'));

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
