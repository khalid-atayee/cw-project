<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class curriculumValidations extends FormRequest
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
            'name' => 'required',
            'description'=>'required|min:70',
            'chapter_id' => 'required',
            'mentors' => 'required',

            'topic.*'=>'required',

          
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'module name is',
            'description' => 'description is',
            'chapter_id' => 'chapter name is ',
            'mentors' => 'mentors are ',
            'topic.*' => 'topic is ',
           
        ];
    }

    public function validate() {
        $instance = $this->getValidatorInstance();
        if ($instance->fails()) {
            throw new HttpResponseException(response()->json($instance->errors(), 422));
        }
    }
}
