<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sessionValidation extends FormRequest
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
            'start_date'=>'required',
            'end_date'=>'required',
            'chapter_id'=>'required',
            'mentor_id'=>'required',
            'curriculam_template_id'=>'required',
            'curriculam_template_item_id'=>'required',

        ];
    }
}
