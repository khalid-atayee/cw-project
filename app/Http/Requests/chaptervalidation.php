<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class chaptervalidation extends FormRequest
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
            'title'=>'required|min:3',
            'city_id'=>'required',
            'fees'=>'required',
            'duration'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'chapter_email'=>'required|email:rfc|unique:users,email',
            'chapter_password'=>'required|same:confirm_password|min:6',
            'confirm_password'=>'required|min:6'
        ];
    }
}
