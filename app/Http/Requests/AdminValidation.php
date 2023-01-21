<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminValidation extends FormRequest
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
            'admin_name'=>'required|min:3',
            'admin_email'=>'required|email:rfc|unique:users,email',
            'admin_password'=>'required|same:admin_cpassword|min:6',
            'admin_cpassword'=>'required|min:6'
        ];
    }
}
