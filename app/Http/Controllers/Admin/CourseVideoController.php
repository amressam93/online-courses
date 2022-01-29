<?php

namespace App\Http\Controllers\Admin;

use App\course;
use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\video;
use Illuminate\Http\Request;

class CourseVideoController extends Controller
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
    public function create(course $course)
    {
        return view('admin.courses.createvideo',compact('course'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request,course $course)
    {

        $data = [
            'title'     => $request->title,
            'link'      => $this->get_video_id_from_url($request->link),
            'course_id' => $request->course_id
        ];

        $video = video::create($data);

        if($video)
            return redirect()->route("courses.show",$course->id)->withStatus(__('Video Successfuly Created'));

        return redirect()->route("course.video.create",$course->id)->withStatus(__('SomeThing Wrong Try Again'));
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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





    private function get_video_id_from_url($youtube_url)
    {
        $url = $youtube_url;

        parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );

        return $my_array_of_vars['v'];
    }


}
