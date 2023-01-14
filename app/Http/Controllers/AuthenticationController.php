<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    //

    public function loginAuth(Request $request){
        // dd($request->all());
        dd($request['email']);
        $validator = Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required',
          

        ],
        [

            'email.required'=>'Your Email is required',
            'password.required'=>'Your Password is required',
         

        ]);

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],400);
        }
    }
    

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');

    }
}
