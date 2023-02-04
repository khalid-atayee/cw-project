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


    function index()
    {

        $chapters = Chapter::all();
        $teams = Team::all();
        return view('home.home', compact('chapters', 'teams'));
    }

    function alumni()
    {

        $chapters = Chapter::all();
        $alumnis = Alumni::take(6)->get();
        return view('alumni.alumni', compact('chapters', 'alumnis'));

        // return view('alumni.alumni',compact('alumnis'));

    }

    function aboutUs()
    {

        $chapters = Chapter::all();
        $alumnis = Alumni::take(6)->get();
        return view('about.aboutUs', compact('chapters', 'alumnis'));
    }

    function curriculam($id)
    {
       
        $data = Chapter::find($id);

        $chapters = Chapter::all();
        return view('curriculam.curriculamIndex', compact('chapters','data'));
    }

    function find(Request $request)
    {
        if ($request->home) {
            $data = Chapter::where('id', $request->home)->first(['title', 'city_id']);
            $chapters = Chapter::all();
            $teams = Team::all();

            return view('home.home', compact('chapters', 'data', 'teams'));

        } else if ($request->program) {

            $data = Chapter::with('organizer', 'mentor', 'curriculumTemplate')->where('id', $request->program)->first();
            
            // dd($data->mentor);
            $chapters = Chapter::all();
            return view('program.program', compact('data', 'chapters'));

        } else if ($request->about) {
            dd('about');
        } else if ($request->alumni) {
            $chapters = Chapter::all();
            $alumnis = Alumni::take(6)->get();
            return view('alumni.alumni',compact('alumnis','chapters'));
        }
        //    $chapter_id = $request->chapter_id;

    }
}


