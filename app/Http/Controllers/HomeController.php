<?php
/**
 * 
 *
 * 
 * @author  Khalid Atayee <khalid.atayee101@gmail.com>
 * @description, This controller is only for website routing
 */

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    function index(){
        $chapters = Chapter::all();
        return view('home.home',compact('chapters'));

    }

    function alumni(){
        $chapters = Chapter::all();
        return view('alumni.alumni',compact('chapters'));
    }

    function aboutUs(){
        $chapters = Chapter::all();
        return view('about.aboutUs',compact('chapters'));
    }

    function curriculam(){
        $chapters = Chapter::all();
        return view('curriculam.curriculamIndex',compact('chapters'));

    }
    
    function find(Request $request){
        if($request->home){
            dd('home');
        }
        else if($request->program){
            dd('program');
        }
    //    $chapter_id = $request->chapter_id;

    }
  
}

