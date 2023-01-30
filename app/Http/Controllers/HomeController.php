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

use App\Models\Alumni;
use App\Models\Team;

use Illuminate\Http\Request;

class HomeController extends Controller
{


    function index(){

        $chapters = Chapter::all();
        $members = Team::all();
        $first = Team::first();
        return view('home.home',compact('chapters','members','first'));

        // return view('home.home', compact('members','first'));


    }

    function alumni(){

        $chapters = Chapter::all();
        $alumnis = Alumni::all();
        return view('alumni.alumni',compact('chapters','alumnis'));

        // return view('alumni.alumni',compact('alumnis'));

    }

    function aboutUs(){

        $chapters = Chapter::all();
        $alumnis = Alumni::all();
        return view('about.aboutUs',compact('chapters','alumnis'));


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
        //    $chapters = Chapter::find($request->program);
        $data = Chapter::with('organizer','mentor','curriculumTemplate')->where('id',$request->program)->get();
        // dd($data[0]->curriculumTemplate);
        // echo '<pre>';
        // print_r($data[0]->curriculumTemplate);
        // exit;
        $chapters = Chapter::all();
        return view('program.program',compact('data','chapters'));

        }

        else if($request->about){
            dd('about');
        }
        else if($request->alumni){
            dd('alumni');
        }
    //    $chapter_id = $request->chapter_id;

    }
  
}

