<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordValidation;
use App\Http\Requests\OTPvalidation;
use App\Mail\ForgotPassword as MailForgotPassword;
use App\Models\Chapter;
use App\Models\otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPassword extends Controller
{
    public function index(){
        $chapters = Chapter::all();
        return view('forgotPassword.forgot',compact('chapters'));
    }

    public function store(OTPvalidation $request){

        if(User::where('email',$request->email)->get()->count()>0){
           $random_otp= rand(1111,9999);
           $random=$random_otp;
           $otp = new otp();
           $otp->otp_number=$random;
           $otp->user_id = User::where('email',$request->email)->first()->id;
           $otp->save();
           if($otp){
               Mail::to($request->email)->send(new MailForgotPassword($random));
               $html_view = view('forgotPassword.otpInput')->render();
               return response()->json(['html_view'=>$html_view,'message'=>'Please check your email we have sent you OTP', 'status'=>'success'],200);

           }
           else{
            return response()->json(['message'=>'something went wrong','status'=>'notFound'],200);

           }



        }
        else{
            return response()->json(['message'=>'your email is not exist','status'=>'notFound'],200);
        }

        // $emailData =Assignment::with('students','grades','sessions','chapters')->where('id',$id)->first();
        // Mail::to($emailData->students->email)->send(new StudentAssignment($emailData));
        // return redirect()->back();
    }

    public function verificaiton(Request $request){
        
        $data= array_values($request->all());
        // array_shift($data); 
        $otp ='';
        foreach ($data as $item){
            $otp = $otp.''.$item;

            
        }
        $otp = (int) $otp;
        // dd($otp);

        if(otp::where('otp_number',$otp)->get()->count()>0){
            $user_id = otp::where('otp_number',$otp)->first()->user_id;
            $html_view = view('resetPassword.resetPasswordForm',compact('user_id'))->render();
            return response()->json(['html_view'=>$html_view, 'status'=>'success'],200);

        }
        else{
            return response()->json(['message'=>'OTP is Not correct','status'=>'notFound'],200);

        }
        // dd((int) $otp);
    }

    public function changePassword(Request $request, $id){
        $user = User::find($id);
        if($user){

            $user->password =  Hash::make($request->password);
            $user->save();
             otp::where('user_id',$id)->delete();
            session()->flash('success-message','Password successfully changed');
            return redirect()->route('cw-home');
        }
        else{
            return redirect()->back();

        }

    }

    
}
