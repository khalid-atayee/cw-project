<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizerValidation extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email:rfc|unique:users,email',
            'password'=>'required',
            'description'=>'required|min:100',
            // 'linkedin'=>'required|url',
            'image'=>'required',
            'chapter_id'=>'required'
        ];
    }
}
