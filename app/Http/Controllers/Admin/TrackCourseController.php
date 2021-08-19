<?php

namespace App\Http\Controllers\Admin;

use App\course;
use App\Http\Controllers\Controller;
use App\photo;
use App\track;
use Illuminate\Http\Request;

class TrackCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(track $track)
    {
        return view('admin.tracks.createcourse',compact('track'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,track $track)
    {
        $rules = [
            'title' => 'required|min:20|max:100',
            'status' => 'required|integer|in:0,1',
            'link' => 'required|url',
            'track_id' => 'required|integer'
        ];

        $this->validate($request,$rules);

        $course = course::create($request->all());

        if($course)
        {
            // insert course image.
            if($file = $request->file('image'))
            {
                $filename = $file->getClientOriginalName();  // get filename

                $file_extension = $file->getClientOriginalExtension();  // get file extention

                $file_to_store = time().'_'.explode('.',$filename)[0].'.'.$file_extension;   // custom filename with extenstion.

                if($file->move('images',$file_to_store))
                {
                    photo::create([
                        'filename' => $file_to_store,
                        'photoable_id' => $course->id,
                        'photoable_type' => 'App\course'
                    ]);

                }

            }

            return redirect()->route('tracks.show',$track->id)->withStatus(__('Course Successfuly Created'));
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
