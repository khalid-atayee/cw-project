<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignmentValidation extends FormRequest
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
            'title'=>'required',
            'description'=>'required',
            'url'=>'required',
            'chapter_id'=>'required',
            'student_id'=>'required',
            'session_id'=>'required',
            'mentor_id'=>'required',
            'grade_id'=>'required',
        ];
    }
}
