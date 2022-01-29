<?php

namespace App\Http\Controllers\Admin;


use App\CourseLevel as Model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countOfLevels = Model::all()->count();     // get count of levels.

        $levels =  Model::orderBy('id','desc')->paginate(15);

        return view('admin.levels.index',['levels' => $levels,'countOfLevels' => $countOfLevels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.levels.create');
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
            'name' => 'required|unique:course_levels|min:3|max:50'
        ];

        $this->validate($request,$rules);


        if(Model::create($request->all()))

            return redirect()->route('levels.index')->withStatus(__('Level Successfully Created'));

        return redirect()->route('levels.index')->withStatus(__('Something Wrong Try Again'));   // else case
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Model $level)
    {
        // return all courses related to this level.

        return view('admin.levels.show',compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Model $level)
    {
        return view('admin.levels.edit',compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model $level)
    {
        $rules = [
            'name' => 'required|min:3|max:50|unique:course_levels,name,'.$level->id,
        ];

        $this->validate($request,$rules);


        if($request->has('name'))
        {
            $level->name = $request->name;
        }


        if($level->isDirty())
        {
            $level->save();

            return redirect()->route('levels.index')->withStatus(__('Level successfully Updated'));
        }
        else
        {
            return redirect()->route('levels.edit',$level->id)->withStatus(__('Nothing Changed'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $level)
    {
        if($level->delete())

            return redirect()->route('levels.index')->withStatus(__('Level Successfully Deleted'));
    }
}
