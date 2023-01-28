<?php

/**
 * 
 *
 * 
 * @author  Khalid Atayee <khalid.atayee101@gmail.com>
 * @description, This controller is only for authentication purposes
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required',
                'password' => 'required',


            ],

            [

                'email.required' => 'Your Email is required',
                'password.required' => 'Your Password is required',


            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $user = User::where('email', '=', $request->email)->first();
        if (!$user) {
            return response()->json(
                [
                    'message' => 'we do not recognize your email address',
                    'status' => 210
                ],
                200
            );
        } else {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->regenerate();
                Auth::login($user);

                return response()->json(['message' => 'sucessfully logged in', 'status' => 200], 200);
            } else {
                return response()->json(['message' => 'please check your password', 'status' => 300], 200);
            }
        }



        $request->session()->regenerate();
        return redirect()->route('dashboard');

        return redirect()->back()->with('message', 'email or password incorrect');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

    public function studentRegistration(Request $request)
    {
        dd($request->all());
    }
}
