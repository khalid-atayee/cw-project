<?php

namespace App\Http\Controllers;

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

    public function storeFeedback(Request $request){
        dd($request->all());
        Feedback::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'message' => $request->message,
        ]);
        // Session::flash('get_in_touch_message', 'Payment done successfully, we will get back to you soon');
        // return redirect()->route('cw-home')->with('status','message will be rewrite');
    }

    
}
