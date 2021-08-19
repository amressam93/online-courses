<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizRequest;
use App\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countOfQuizzes = Quiz::all()->count();    // get count of all Quizzes.

        $quizzes = Quiz::orderBy('id','desc')->paginate(15);

        return view('admin.quizzes.index',['quizzes' => $quizzes,'countOfQuizzes' => $countOfQuizzes]);

    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quizzes.create');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizRequest $request)
    {
        $quiz = Quiz::create([

           'name'      => $request->name,
           'course_id' => $request->course_id

        ]);

        if($quiz)

            return redirect()->route('quizzes.index')->withStatus(__('Quiz Successfully Created'));

        return redirect()->route('quizzes.create')->withStatus(__('Something Wrong Try Again'));

    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        return view('admin.quizzes.show',compact('quiz'));
    }





    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        return view('admin.quizzes.edit',compact('quiz'));
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizRequest $request, Quiz $quiz)
    {
        if($quiz->update([

            'name'      => $request->name,
            'course_id' => $request->course_id
        ]))

        {
            return redirect()->route('quizzes.index')->withStatus(__('Quiz Successfully Updated'));
        }

        else
        {
            return redirect()->route('quizzes.edit',$quiz->id)->withStatus(__('SomeThing Wrong Try Again'));
        }

    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        if($quiz->delete())

            return redirect()->route('quizzes.index')->withStatus(__('Quiz Successufully Deleted'));
    }



}
