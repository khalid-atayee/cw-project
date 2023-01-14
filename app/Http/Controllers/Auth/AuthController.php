<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){
        // dd($request->email);
           // dd($request->all());
        //    dd($request['email']);

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
           $user = User::where('email', '=',$request->email)->first();
           if(!$user){
            return back().with('fail','we do not recognize your email address');

           }
           else{
            if(Hash::check($request->password, $user->password)){
                $request->session()->regenerate();
                Auth::login($user);
                
                return response()->json(['message'=>'sucessfully logged in'],200);
            }else{
                // dd('incorrect password');
            }

           }
           


            $request->session()->regenerate();
            return redirect()->route('dashboard');
        
        return redirect()->back()->with('message','email or password incorrect');
        
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');

    }
    
    public function studentRegistration(Request $request){
        dd($request->all());
    }
}
