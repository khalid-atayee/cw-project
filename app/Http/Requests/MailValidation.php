<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailValidation extends FormRequest
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
            'email_title'=>'required',
            'email_description'=>'required',
            'chapter_id'=>'required'

        ];
    }

    public function messages()
    {
        return [
            'required'=>':attribute required'

        ];
    }

    public function attributes()
    {
        return [
            'email_title'=>'Email Title is ',
            'email_description'=>'Email Description is',
            'chapter_id'=>'Chapter is '
        ];
        
    }
}
