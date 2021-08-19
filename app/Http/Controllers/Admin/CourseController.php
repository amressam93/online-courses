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

            return redirect()->route('courses.index')->withStatus(__('Course Successfuly Created'));
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
            'status'   => 'required|integer|in:0,1',
            'link'     => 'required|url',
            'track_id' => 'required|integer'
        ];

        $this->validate($request,$rules);

        $course->update($request->all());

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
