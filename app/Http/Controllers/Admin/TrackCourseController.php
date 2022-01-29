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
            'description' => 'required',
            'status' => 'required|integer|in:0,1',
            'link' => 'required|url',
            'track_id' => 'required|integer',
            'level_id' => 'required|integer',
        ];

        $this->validate($request,$rules);

        $data = [

            'title'       => $request->title,
            'description' => $request->description,
            'slug'        => $this->Process_Slug($request->title),
            'status'      => $request->status,
            'link'        => $request->link,
            'track_id'    => $request->track_id,
            'level_id'    => $request->level_id
        ];

        $course = course::create($data);

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



    private function Process_Slug($name) {

        $space = array(' ');
        $dash  = array("-");

        $value     = preg_replace('/[^\x{0600}-\x{06FF}a-zA-Z0-9]/u', ' ', $name);
        $url1  = str_replace($space, $dash, $value);
        $url2 = preg_replace('#-+#','-',$url1);

        if($this->isArabic($url2) == false) {
            $url2  = strtolower($url2);
        }

        $first_ch = $url2[0];
        $last_ch = substr($url2, -1);

        if($first_ch == '-') {
            $url2 = substr_replace($url2, "", 0, 1);
        }

        if($last_ch == '-') {
            $url2 = substr_replace($url2, "", strlen($url2)-1, strlen($url2));
        }

        return $url2;
    }


    private function isArabic($string) {

        if(preg_match('/\p{Arabic}/u', $string)) {
            return true;
        } else {
            return false;
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
