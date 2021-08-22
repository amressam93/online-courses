<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countOfQuestions = Question::all()->count();    // get count of all Questions.

        $questions = Question::orderBy('id','desc')->paginate(15);

        return view('admin.questions.index',['questions' => $questions,'countOfQuestions' => $countOfQuestions]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        if(
        Question::create([
            'title'        => $request->title,
            'answers'      => $request->answers,
            'right_answer' => $request->right_answer,
            'score'        => $request->score,
            'quiz_id'      => $request->quiz_id
        ])

        )

            return redirect()->route("questions.index")->withStatus(__('Question Successfuly Created'));

              return redirect()->route("questions.create")->withStatus(__('Something is Wrong , Try Again'));

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('admin.questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, Question $question)
    {
        if(
            $question->update([
                'title'        => $request->title,
                'answers'      => $request->answers,
                'right_answer' => $request->right_answer,
                'score'        => $request->score,
                'quiz_id'      => $request->quiz_id
            ])
        )

            return redirect()->route('questions.index')->withStatus(__('Question Successfuly Updated'));

                return redirect()->route('questions.edit',$question->id)->withStatus(__('Something is Wrong , Try Again'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        if($question->delete())

            return redirect()->route('questions.index')->withStatus(__('Question Successfuly Deleted'));

    }
}
