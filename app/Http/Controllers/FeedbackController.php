<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

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

    public function storeFeedback(Request $request){
        // dd("hello");
        Feedback::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'message' => $request->message,
        ]);
        return redirect()->route('cw-home');
    }

    
}
