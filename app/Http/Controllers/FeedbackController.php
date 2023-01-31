<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetInTouchValidation;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Session;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function feedbacks()
    {
        $feedbacks = Feedback::all();
        return view('admin.feedbacks.index',compact('feedbacks'));
    }

    public function storeFeedback(GetInTouchValidation $request){
        // dd("hello");
        Feedback::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'message' => $request->message,
        ]);
        session()->flash('success-message', 'Thank you for your Inquiry, we will get back to you soon');
        return redirect()->route('cw-home');
    }

    
}
