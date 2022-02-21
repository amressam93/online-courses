<?php

namespace App\Http\Controllers;

use App\course;
use App\track;
use Illuminate\Http\Request;

class allCoursesController extends Controller
{


    public function index()
    {
        $tracks = implode(", ",track::orderBy('id','desc')->limit(5)->pluck('name')->toArray());

        return view('website.all_courses',compact('tracks'));
    }



    public function load_more_data(Request $request)
    {
        if($request->ajax())
        {
            $courses = course::orderBy('id','desc')->paginate(6);

            $total_courses = $courses->total();

            $displaying = ($courses->currentpage()-1)*$courses->perpage()+$courses->count();

            $free_courses_count = course::orderBy('id','desc')->where('status',0)->count();
            $paid_courses_count = course::orderBy('id','desc')->where('status',1)->count();

            $returnHTML = view('layouts.webiste.sections.all_courses_filter', ['courses' => $courses])->render();

            return response()->json(array('success' => true, 'html' => $returnHTML,'courses' => $courses,'total_courses' => $total_courses , 'displaying' => $displaying));

        }

    }

    public function filter(Request $request)
    {
        if($request->ajax())
        {
            if($request->track != null)
            {

                if($request->level != null)
                {
                    if($request->price != null)
                    {
                        $courses = course::whereIn('track_id',$request->track)
                            ->whereIn('level_id',$request->level)
                            ->whereIn('status',$request->price)
                            ->orderBy('id','desc')
                            ->paginate(6);

                        $total_courses = $courses->total(); // get total courses.

                        $displaying = ($courses->currentpage()-1)*$courses->perpage()+$courses->count();  // get count of total courses current page.

                    }
                    else
                    {
                        $courses = course::whereIn('track_id',$request->track)
                            ->whereIn('level_id',$request->level)
                            ->orderBy('id','desc')
                            ->paginate(6);

                        $total_courses = $courses->total(); // get total courses.

                        $displaying = ($courses->currentpage()-1)*$courses->perpage()+$courses->count();  // get count of total courses current page.

                    }


                }

                elseif ($request->price != null)
                {
                    if($request->level != null)
                    {
                        $courses = course::whereIn('track_id',$request->track)
                            ->whereIn('level_id',$request->level)
                            ->whereIn('status',$request->price)
                            ->orderBy('id','desc')
                            ->paginate(6);

                        $total_courses = $courses->total(); // get total courses.

                        $displaying = ($courses->currentpage()-1)*$courses->perpage()+$courses->count();  // get count of total courses current page.

                    }
                    else
                    {
                        $courses = course::whereIn('track_id',$request->track)
                            ->whereIn('status',$request->price)
                            ->orderBy('id','desc')
                            ->paginate(6);

                        $total_courses = $courses->total(); // get total courses.

                        $displaying = ($courses->currentpage()-1)*$courses->perpage()+$courses->count();  // get count of total courses current page.

                    }


                }

                else
                {
                    $courses = course::whereIn('track_id',$request->track)
                        ->orderBy('id','desc')
                        ->paginate(6);

                    $total_courses = $courses->total(); // get total courses.

                    $displaying = ($courses->currentpage()-1)*$courses->perpage()+$courses->count();  // get count of total courses current page.


                }

            }

            elseif ($request->level != null)
            {
                if($request->track != null)
                {
                    if($request->price != null)
                    {
                        $courses = course::whereIn('level_id',$request->level)
                            ->whereIn('track_id',$request->track)
                            ->whereIn('status',$request->price)
                            ->orderBy('id','desc')
                            ->paginate(6);

                        $total_courses = $courses->total(); // get total courses.

                        $displaying = ($courses->currentpage()-1)*$courses->perpage()+$courses->count();  // get count of total courses current page.

                    }
                    else
                    {
                        $courses = course::whereIn('level_id',$request->level)
                            ->whereIn('track_id',$request->track)
                            ->orderBy('id','desc')
                            ->paginate(6);

                        $total_courses = $courses->total(); // get total courses.

                        $displaying = ($courses->currentpage()-1)*$courses->perpage()+$courses->count();  // get count of total courses current page.

                    }


                }

                elseif ($request->price != null)
                {
                    if($request->track != null)
                    {
                        $courses = course::whereIn('level_id',$request->level)
                            ->whereIn('track_id',$request->track)
                            ->whereIn('status',$request->price)
                            ->orderBy('id','desc')
                            ->paginate(6);

                        $total_courses = $courses->total(); // get total courses.

                        $displaying = ($courses->currentpage()-1)*$courses->perpage()+$courses->count();  // get count of total courses current page.

                    }
                    else
                    {
                        $courses = course::whereIn('level_id',$request->level)
                            ->whereIn('status',$request->price)
                            ->orderBy('id','desc')
                            ->paginate(6);

                        $total_courses = $courses->total(); // get total courses.

                        $displaying = ($courses->currentpage()-1)*$courses->perpage()+$courses->count();  // get count of total courses current page.

                    }


                }

                else
                {
                    $courses = course::whereIn('level_id',$request->level)
                        ->orderBy('id','desc')
                        ->paginate(6);

                    $total_courses = $courses->total(); // get total courses.

                    $displaying = ($courses->currentpage()-1)*$courses->perpage()+$courses->count();  // get count of total courses current page.

                }

            }

            elseif ($request->price != null)
            {
                if($request->track != null)
                {
                    if($request->level != null)
                    {
                        $courses = course::whereIn('status',$request->price)
                            ->whereIn('track_id',$request->track)
                            ->whereIn('level_id',$request->level)
                            ->orderBy('id','desc')
                            ->paginate(6);

                        $total_courses = $courses->total(); // get total courses.

                        $displaying = ($courses->currentpage()-1)*$courses->perpage()+$courses->count();  // get count of total courses current page.

                    }
                    else
                    {
                        $courses = course::whereIn('status',$request->price)
                            ->whereIn('track_id',$request->track)
                            ->orderBy('id','desc')
                            ->paginate(6);

                        $total_courses = $courses->total(); // get total courses.

                        $displaying = ($courses->currentpage()-1)*$courses->perpage()+$courses->count();  // get count of total courses current page.


                    }


                }

                elseif ($request->level != null)
                {
                    if($request->track != null)
                    {
                        $courses = course::whereIn('status',$request->price)
                            ->whereIn('level_id',$request->level)
                            ->whereIn('track_id',$request->track)
                            ->orderBy('id','desc')
                            ->paginate(6);

                        $total_courses = $courses->total(); // get total courses.

                        $displaying = ($courses->currentpage()-1)*$courses->perpage()+$courses->count();  // get count of total courses current page.

                    }
                    else
                    {
                        $courses = course::whereIn('status',$request->price)
                            ->whereIn('level_id',$request->level)
                            ->orderBy('id','desc')
                            ->paginate(6);

                        $total_courses = $courses->total(); // get total courses.

                        $displaying = ($courses->currentpage()-1)*$courses->perpage()+$courses->count();  // get count of total courses current page.

                    }


                }

                else
                {
                    $courses = course::whereIn('status',$request->price)
                        ->orderBy('id','desc')
                        ->paginate(6);

                    $total_courses = $courses->total(); // get total courses.

                    $displaying = ($courses->currentpage()-1)*$courses->perpage()+$courses->count();  // get count of total courses current page.


                }
            }

            else
            {
                $courses = course::orderBy('id','desc')
                    ->paginate(6);

                $total_courses = $courses->total(); // get total courses.

                $displaying = ($courses->currentpage()-1)*$courses->perpage()+$courses->count();  // get count of total courses current page.

            }


            $returnHTML = view('layouts.webiste.sections.all_courses_filter', ['courses' => $courses ])->render();

            return response()->json(array('success' => true, 'html' => $returnHTML,'courses' => $courses,'total_courses' => $total_courses , 'displaying' => $displaying));


        }
    }



}
