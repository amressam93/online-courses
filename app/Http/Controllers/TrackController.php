<?php

namespace App\Http\Controllers;

use App\track;
use DB;
use Illuminate\Http\Request;

class TrackController extends Controller
{

    public function index($trackName)
    {

        $track = track::where('name',$trackName)->first();

        if($track)
        {
            return view('website.track_courses',compact('track'));
        }
        else
        {
            abort('404');
        }

    }

    /**
     * Load data Courses Four Records By Request.
     * @param Request $request
     * @param $track_name
     * @return \Illuminate\Http\JsonResponse|void
     * @throws \Throwable
     */
    public function load_data(Request $request, $track_name)
    {
        if($request->ajax())
        {

            $track = track::where('name',$track_name)->first();

            if($request->id > 0)
            {

                if($request->level != "")
                {
                    if($request->price != "")
                    {
                        $courses = $track->courses()
                            ->where('id','<', $request->id)
                            ->whereIn('level_id',$request->level)
                            ->whereIn('status',$request->price)
                            ->orderBy('id','desc')
                            ->limit(4)
                            ->get();
                    }
                    else
                    {
                        $courses = $track->courses()
                            ->where('id','<', $request->id)
                            ->whereIn('level_id',$request->level)
                            ->orderBy('id','desc')
                            ->limit(4)
                            ->get();
                    }

                }
                elseif ($request->price != "")
                {
                    if($request->level != "")
                    {
                        $courses = $track->courses()
                            ->where('id','<', $request->id)
                            ->whereIn('status',$request->price)
                            ->whereIn('level_id',$request->level)
                            ->orderBy('id','desc')
                            ->limit(4)
                            ->get();
                    }
                    else
                    {
                        $courses = $track->courses()
                            ->where('id','<', $request->id)
                            ->whereIn('status',$request->price)
                            ->orderBy('id','desc')
                            ->limit(4)
                            ->get();
                    }

                }
                else
                {
                    $courses = $track->courses()
                        ->where('id','<', $request->id)
                        ->orderBy('id','desc')
                        ->limit(4)
                        ->get();
                }


            }
            else
            {
                $courses = $track->courses()
                    ->orderBy('id','desc')
                    ->limit(4)
                    ->get();
            }


//            if($request->id > 0)
//            {
//                $courses = $track->courses()
//                    ->where('id','<', $request->id)
//                    ->orderBy('id','desc')
//                    ->limit(4)
//                    ->get();
//            }
//            else
//            {
//                $courses = $track->courses()
//                    ->orderBy('id','desc')
//                    ->limit(4)
//                    ->get();
//            }


            if(!$courses->isEmpty())
            {
                $returnHTML = view('layouts.webiste.sections.track_courses', ['courses' => $courses , 'track' => $track])->render();
                return response()->json(array('success' => true, 'html' => $returnHTML,'courses' => $courses));

                //  return view('layouts.webiste.sections.track_courses',compact('courses'));
            }
            else
            {
                //return view('layouts.webiste.sections.tracks_course_if_is_empty_button');
                $returnHTML =  view('layouts.webiste.sections.tracks_course_if_is_empty_button')->render();
                return response()->json(array('success' => true,'html' => $returnHTML));
            }


        }

    }


    /**
     * Courses Filter
     * @param Request $request
     * @param $track_name
     * @return \Illuminate\Http\JsonResponse|void
     * @throws \Throwable
     */
    public function filter(Request $request, $track_name)
    {
        $track = track::where('name',$track_name)->first();

        if($request->ajax())
        {
            if($request->level != null)
            {
                if($request->price != null)
                {
                    $courses = $track->courses()
                        ->whereIn('level_id',$request->level)
                        ->whereIn('status',$request->price)
                        ->orderBy('id','desc')
                        ->limit(4)
                        ->get();
                }
                else
                {
                    $courses = $track->courses()
                        ->whereIn('level_id',$request->level)
                        ->orderBy('id','desc')
                        ->limit(4)
                        ->get();
                }

            }
            elseif ($request->price != null)
            {

                if($request->level != null)
                {
                    $courses = $track->courses()
                        ->whereIn('status',$request->price)
                        ->whereIn('level_id',$request->level)
                        ->orderBy('id','desc')
                        ->limit(4)
                        ->get();
                }
                else
                {
                    $courses = $track->courses()
                        ->whereIn('status',$request->price)
                        ->orderBy('id','desc')
                        ->limit(4)
                        ->get();
                }

            }
            else
            {
                $courses = $track->courses()
                    ->orderBy('id','desc')
                    ->limit(4)
                    ->get();
            }



            if(!$courses->isEmpty())
            {
                $returnHTML = view('layouts.webiste.sections.track_courses', ['courses' => $courses , 'track' => $track])->render();
                return response()->json(array('success' => true, 'html' => $returnHTML,'courses' => $courses));

            }
            else
            {
                $returnHTML =  view('layouts.webiste.sections.tracks_course_if_is_empty_button')->render();
                return response()->json(array('success' => true,'html' => $returnHTML));
            }



        }






    }

}
