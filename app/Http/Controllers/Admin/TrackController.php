<?php

namespace App\Http\Controllers\admin;

use App\course;
use App\Http\Controllers\Controller;
use App\track;
use Illuminate\Http\Request;

class TrackController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countOfTracks = track::all()->count();     // get count of tracks.

        $tracks =  track::orderBy('id','desc')->paginate(15);

        return view('admin.tracks.index',['tracks' => $tracks,'countOfTracks' => $countOfTracks]);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tracks.create');
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
            'name' => 'required|min:3|max:50'
        ];

        $this->validate($request,$rules);

        if(track::create($request->all()))

        return redirect()->route('tracks.index')->withStatus(__('Track Successfully Created'));

           return redirect()->route('tracks.index')->withStatus(__('Something Wrong Try Again'));   // else case

    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(track $track)
    {
        // return all courses related to this track.
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(track $track)
    {
        return view('admin.tracks.edit',compact('track'));
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, track $track)
    {
        $rules = [
            'name' => 'required|min:3|max:50'
        ];

        $this->validate($request,$rules);

        if($request->has('name'))
        {
            $track->name = $request->name;
        }

        if($track->isDirty())
        {
            $track->save();

            return redirect()->route('tracks.index')->withStatus(__('Track successfully Updated'));
        }
        else
        {
            return redirect('admin/tracks/'.$track->id.'/edit')->withStatus(__('Nothing Changed'));
        }

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(track $track)
    {
        if($track->delete())

          return redirect()->route('tracks.index')->withStatus(__('Track Successfully Deleted'));
    }
}
