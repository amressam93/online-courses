<?php

namespace App\Http\Controllers;

use anlutro\LaravelSettings\ArrayUtil;
use App\course;
use App\CourseLevel;
use App\track;
use App\video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\PseudoTypes\NonEmptyLowercaseString;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class CourseSearchController extends Controller
{
    public function index(Request $request)
    {

//        $results = Search::add(course::class, ['title','description'])
//            ->add(Video::class, 'title')

//        $results = Search::add(course::with('videos'), ['title','description'])
//            ->add(Video::class, 'title')
//            ->beginWithWildcard()
//            ->get($request->get('q'));
//
//       return $results;

//        $search = $request->q; // request of search input.
//
//        $results = course::where('title','like','%'.$search.'%')         // get course where course title like q from courses table.
//            ->orWhere('description','like','%'.$search.'%')               // get course where course description like q from courses table.
//            ->orWhereHas('videos', function ($query) use ($search) {
//                $query->where('title', 'like', '%'.$search.'%');          // get course where video title like q from videos table.
//            })
//            ->count();

        $search = $request->has('q') ? $request->q : " ";                         // request of search input.


        if ($request->has('track') && $request->ajax())
        {
            $q = course::where(function ($query) use ($search){

                $query->where('title', 'like', '%' . $search . '%');
                $query->orWhere('description', 'like', '%' . $search . '%');
                $query->orWhereHas('videos', function ($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%');          // get course where video title like q from videos table.
                });
            })->whereIn('track_id', $request->track);


            if($request->has('price')){

                $q->whereIn('status',$request->price);

            }


            if($request->has('level')){

                $q->whereIn('level_id',$request->level);

            }


            $results = $q->paginate(9);

            $total_courses = $results->total();

            $displaying = ($results->currentpage()-1)*$results->perpage()+$results->count();


            $paid_courses = course::SearchQuery($search)->whereIn('track_id', $request->track)->where('status',1)->count();
            $free_courses = course::SearchQuery($search)->whereIn('track_id', $request->track)->where('status',0)->count();



            $returnHTML = view('layouts.webiste.sections.courses_filter', ['results' => $results])->render();                  // or method that you prefere to return data + RENDER is the key here
            return response()->json(array('success' => true, 'html' => $returnHTML,'total_courses' => $total_courses,'search' => $search,'displaying' => $displaying,'paid_courses' => $paid_courses,'free_courses' => $free_courses));
        }


        if ($request->has('price') && $request->ajax())
        {


            //$results = course::whereIn('status', $request->price)->paginate(9);
            // return  response()->json($results); //return to ajax
            //   return view('website.test', compact('results'));

           // $search = $request->has('q') ? $request->q : " ";                         // request of search input.

            $q = course::where(function ($query) use ($search){

                $query->where('title', 'like', '%' . $search . '%');
                $query->orWhere('description', 'like', '%' . $search . '%');
                $query->orWhereHas('videos', function ($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%');          // get course where video title like q from videos table.
                });
            })->whereIn('status', $request->price);


            if($request->has('track'))
            {
                $q->whereIn('track_id',$request->track);
            }


            if($request->has('level'))
            {
                $q->whereIn('level_id',$request->level);
            }

            $results = $q->paginate(9);

            $total_courses = $results->total();

            $displaying = ($results->currentpage()-1)*$results->perpage()+$results->count();

            $paid_courses = course::SearchQuery($search)->whereIn('status', $request->price)->where('status',1)->count();
            $free_courses = course::SearchQuery($search)->whereIn('status', $request->price)->where('status',0)->count();


            $returnHTML = view('layouts.webiste.sections.courses_filter', ['results' => $results])->render();                  // or method that you prefere to return data + RENDER is the key here
            return response()->json(array('success' => true, 'html' => $returnHTML,'total_courses' => $total_courses,'search' => $search,'displaying' => $displaying,'free_courses' => $free_courses,'paid_courses' => $paid_courses));

        }


        if ($request->has('level') && $request->ajax())
        {

            $q = course::where(function ($query) use ($search){

                $query->where('title', 'like', '%' . $search . '%');
                $query->orWhere('description', 'like', '%' . $search . '%');
                $query->orWhereHas('videos', function ($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%');          // get course where video title like q from videos table.
                });
            })->whereIn('level_id',$request->level);


            if($request->has('price')){

                $q->whereIn('status',$request->price);

            }

            if($request->has('track')){

                $q->whereIn('track_id',$request->track);

            }


            $results = $q->paginate(9);

            $total_courses = $results->total();

            $displaying = ($results->currentpage()-1)*$results->perpage()+$results->count();


            $paid_courses = course::SearchQuery($search)->whereIn('level_id', $request->level)->where('status',1)->count();
            $free_courses = course::SearchQuery($search)->whereIn('level_id', $request->level)->where('status',0)->count();



            $returnHTML = view('layouts.webiste.sections.courses_filter', ['results' => $results])->render();                  // or method that you prefere to return data + RENDER is the key here
            return response()->json(array('success' => true, 'html' => $returnHTML,'total_courses' => $total_courses,'search' => $search,'displaying' => $displaying,'paid_courses' => $paid_courses,'free_courses' => $free_courses));
        }


        else if (!$request->has(['track','price','level']) && $request->ajax())
        {
           // $search = $request->has('q') ? $request->q : " "; // request of search input.

            $q = course::where('title', 'like', '%' . $search . '%')         // get course where course title like q from courses table.
            ->orWhere('description', 'like', '%' . $search . '%')               // get course where course description like q from courses table.
            ->orWhereHas('videos', function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');          // get course where video title like q from videos table.
            });

            $results = $q->paginate(9);

            $total_courses = $results->total();

            $displaying = ($results->currentpage()-1)*$results->perpage()+$results->count();

            $paid_courses = course::SearchQuery($search)->where('status',1)->count();
            $free_courses = course::SearchQuery($search)->where('status',0)->count();

            $returnHTML = view('layouts.webiste.sections.courses_filter', ['results' => $results])->render();// or method that you prefere to return data + RENDER is the key here
            return response()->json(array('success' => true, 'html' => $returnHTML,'total_courses' => $total_courses,'search' => $search,'displaying' => $displaying,'free_courses' => $free_courses,'paid_courses' => $paid_courses));
//            return view('website.course_search',compact('results','search','total_courses'));
        }




       // $search = $request->has('q') ? $request->q : " ";         // request of search input.

        $q = course::where(function ($query) use ($search){

            $query->where('title', 'like', '%' . $search . '%');
            $query->orWhere('description', 'like', '%' . $search . '%');
            $query->orWhereHas('videos', function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');          // get course where video title like q from videos table.
            });
        });

//        if($request->has('price'))
//        {
//            $q->whereIn('status', $request->price);
//        }


        $results = $q->paginate(9);

        $total_courses = $results->total();


        $free_courses = course::where(function ($query) use ($search){

            $query->where('title', 'like', '%' . $search . '%');
            $query->orWhere('description', 'like', '%' . $search . '%');
            $query->orWhereHas('videos', function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');           // get free courses depended on keyword search.
            });
        })->where('status',0)->count();


        $paid_courses = course::where(function ($query) use ($search){

            $query->where('title', 'like', '%' . $search . '%');
            $query->orWhere('description', 'like', '%' . $search . '%');
            $query->orWhereHas('videos', function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');          // get paid courses depended on keyword search.
            });
        })->where('status',1)->count();



        $tracks_ids = course::where(function ($query) use ($search){

            $query->where('title', 'like', '%' . $search . '%');
            $query->orWhere('description', 'like', '%' . $search . '%');
            $query->orWhereHas('videos', function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');          // get paid courses depended on keyword search.
            });
        })->pluck('track_id');


        $tracks = track::whereIn('id',$tracks_ids)->get();

        $levels_ids = course::where(function ($query) use ($search){

            $query->where('title', 'like', '%' . $search . '%');
            $query->orWhere('description', 'like', '%' . $search . '%');
            $query->orWhereHas('videos', function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');          // get paid courses depended on keyword search.
            });
        })->pluck('level_id');






        $levels = CourseLevel::whereIn('id',$levels_ids)->get();




//        $test = course::where(function ($query) use ($search){
//
//            $query->where('title', 'like', '%' . $search . '%');
//            $query->orWhere('description', 'like', '%' . $search . '%');
//            $query->orWhereHas('videos', function ($query) use ($search) {
//                $query->where('title', 'like', '%' . $search . '%');
//            });
//        });

        //return $test;






  //          $returnHTML = view('layouts.webiste.sections.courses_filter',['results' => $results])->render();// or method that you prefere to return data + RENDER is the key here
//            return response()->json( array('success' => true, 'html'=>$returnHTML) );
        return view('website.course_search',compact('results','search','total_courses','free_courses','paid_courses','tracks','levels'));



        // 13 Ipsum

        //    $total_courses = $results->total();

        //   return view('website.course_search',compact('results','search','total_courses'));

    }



    public function filter(Request $request)
    {


    }





}
