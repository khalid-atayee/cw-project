<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StudentValidation extends FormRequest
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
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'location' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'password' => 'required',
            'chapter' => 'required',
            'education' => 'required',
            'experiance' => 'required'
            
        ];
    }

    public function messages()
    {
        return [
            'required'=> ':attribute required '

        ];
    }
    public function attributes()
    {
        return [

            
            'firstname' => 'First name is ',
            'lastname' => 'Last name is ',
            'gender' => 'Gender is ',
            'dob' => 'Date of birth is ',
            'location' => 'Your location is ',
            'contact' => 'Contact is ',
            'email' => 'Email is ',
            'password' => 'Password is ',
            'chapter' => 'Chapter is ',
            'education' => 'Your Education background is ',
            'experiance' => 'Your experience is ',

        ];
    }

    public function validate() {
        $instance = $this->getValidatorInstance();
        if ($instance->fails()) {
            throw new HttpResponseException(response()->json($instance->errors(), 422));
        }
    }
}
