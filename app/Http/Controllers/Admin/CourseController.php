<?php

namespace App\Http\Controllers\admin;

use App\course;
use App\Http\Controllers\Controller;
use App\photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $countOfCourses = course::all()->count();     // get count of all courses.

        $courses = course::orderBy('id','desc')->paginate(15);

        return view('admin.courses.index',['courses' => $courses,'countOfCourses' => $countOfCourses]);

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create');
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

            return redirect()->route('courses.index')->withStatus(__('Course Successfuly Created'));
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
    public function show(course $course)
    {
        return view('admin.courses.show',compact('course'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(course $course)
    {
        return view('admin.courses.edit',compact('course'));
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, course $course)
    {
        $rules = [
            'title'    => 'required|min:20|max:100',
            'description' => 'required',
            'status'   => 'required|integer|in:0,1',
            'link'     => 'required|url',
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



        $course->update($data);

        if($file = $request->file('image'))
        {
            $filename       = $file->getClientOriginalName();
            $file_extention = $file->getClientOriginalExtension();
            $file_to_store  = time().'_'.explode('.',$filename)[0].'.'.$file_extention;



            if($file->move('images',$file_to_store))
            {
                if($course->photo)
                {
                    $photo = $course->photo;

                    // Start remove old photo.

                    $oldFileName = $photo->filename;     // get old file name of course.
                    unlink('images/'.$oldFileName);

                    // End remove old photo.

                    $photo->filename = $file_to_store;       // update file name if uploaded new course photo.
                    $photo->save();
                }
                else
                {
                    photo::create([
                        'filename'       => $file_to_store,
                        'photoable_id'   => $course->id,
                        'photoable_type' => 'App\course'
                    ]);
                }

            }


        }

        return redirect()->route('courses.index')->withStatus(__('Course Successfully Updated'));

    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(course $course)
    {

        if($course->photo)
        {
            $oldFileName  = $course->photo->filename;     // get old file name of course photo.
            unlink('images/'.$oldFileName);       // delete coures photo from directory server.

            $course->photo->delete();                     // delete course photo from database.
        }

        $course->delete();

        return redirect()->route('courses.index')->withStatus(__('Course Successfully Deleted'));
    }
}
