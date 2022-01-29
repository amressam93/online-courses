<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\video;
use Illuminate\Http\Request;

class VideoController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countOfVideos = video::all()->count();    // get count of all videos.

        $videos = video::orderBy('id','desc')->paginate(15);

        return view('admin.videos.index',['countOfVideos' => $countOfVideos , 'videos' => $videos]);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videos.create');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {

        $data = [
            'title'     => $request->title,
            'link'      => $this->get_video_id_from_url($request->link),
            'course_id' => $request->course_id
        ];

        $video = video::create($data);

        if($video)
            return redirect()->route("videos.index")->withStatus(__('Video Successfuly Created'));

        return redirect()->route("videos.create")->withStatus(__('SomeThing Wrong Try Again'));
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(video $video)
    {
        return view('admin.videos.show',compact('video'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(video $video)
    {
        return view('admin.videos.edit',compact('video'));
    }






    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request, video $video)
    {
        $data = [
            'title'     => $request->title,
            'link'      => $this->get_video_id_from_url($request->link),
            'course_id' => $request->course_id
        ];

        if($video->update($data))

            return redirect()->route('videos.index')->withStatus(__('Video Successfuly Updated'));

        return redirect('admin/videos/'.$video->id.'/edit')->withStatus(__('Something Wrong Try Again'));

    }







    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(video $video)
    {
        if($video->delete())

            return redirect()->route('videos.index')->withStatus(__('Video Successfuly Deleted'));
    }




    private function get_video_id_from_url($youtube_url)
    {
        $url = $youtube_url;

        parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );

        return $my_array_of_vars['v'];
    }



}
