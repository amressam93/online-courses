<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' =>        ['required','min:10','max:750'],
            'answers' =>      ['required','min:10','max:1000'],
            'right_answer' => ['required','min:3','max:50'],
            'score'        => ['required','integer','in:5,10,15,20,25,30'],
            'quiz_id'      => ['required','integer']

        ];
    }
}
