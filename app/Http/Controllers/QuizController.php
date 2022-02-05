<?php

namespace App\Http\Controllers;

use App\course;
use App\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{

    public function index($courseSlug,$quizName)
    {

        $course = course::where('slug',$courseSlug)->first();

        $quiz = $course->quizzes()->where('name',$quizName)->first();

        $quiz_id = $quiz->id;

        $quiz_data = $course->quizzes()->where('id',$quiz_id)->first();



        $user = auth()->user();
        $quizzes_ids = [];

        foreach ($user->quizzes as $quiz)
        {
            $quizzes_ids[] = $quiz->id;
        }

        if(in_array($quiz_id, $quizzes_ids))
        {
            return redirect()->route('single_course',['slug' => $courseSlug,'id' => $quiz->course->id])->with('warning',"You already passed  {$quiz_data->name} Quiz");
        }
        else
        {
            $quiz = $course->quizzes()->where('id',$quiz_id)->first();

            return view('website.course_quiz',compact('quiz','course'));
        }


    }

    public function store($courseSlug,$quizName,Request $request)
    {

       $quiz = Quiz::where('name',$quizName)->first();

       $questions = $quiz->questions;  // get all questions by quiz id

       $questions_ids = [];
       $questions_right_answers = [];
       $quiz_score = 0;

       foreach ($questions as $question)
       {
           $questions_ids[]     = $question->id;
           $questions_right_answers[] = $question->right_answer;
           $quiz_score += $question->score;

       }

       for($i = 0; $i < count($questions_ids); $i++)
       {
           $your_answer = trim($request['answer'.$questions_ids[$i]]);   // answer from form

           $the_answer = trim($questions_right_answers[$i]);     // right answer from database

           if($your_answer != $the_answer)
           {

               return redirect()->route('course_quizzes',['slug' => $courseSlug , 'quizName' => $quizName])->with('error',"Your Answer ( {$your_answer} ) Is Not Correct");
           }


       }

       // attach user with quiz.

       $user = auth()->user();



       $user->quizzes()->sync([$quiz->id],false);

       // increment user Score.

      $user->score += $quiz_score;

      if($user->save())

      {
          return redirect()->route('single_course',['slug' => $courseSlug,'id' => $quiz->course->id])->with('success',"Well done, You have Solved {$quiz->name} Quiz And Earned $quiz_score Points");
      }




    }

}
