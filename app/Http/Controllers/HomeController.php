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

        $default_chapter = Chapter::take(1)->get();
        $chapters = Chapter::all();
        $teams = Team::take(4)->get();
        return view('home.home', compact('chapters', 'teams','default_chapter'));
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
            $default_chapter = Chapter::take(1)->get();
            $data = Chapter::where('id', $request->home)->first(['title', 'city_id']);
            $chapters = Chapter::all();
            $teams = Team::all();

            return view('home.home', compact('chapters', 'data', 'teams','default_chapter'));

        } else if ($request->program) {
            $default_chapter = Chapter::take(1)->get();
             $curiculumn = Chapter::with('organizer', 'mentor', 'curriculumTemplate')->take(1)->get();

            $data = Chapter::with('organizer', 'mentor', 'curriculumTemplate')->where('id', $request->program)->first();
            
            $chapters = Chapter::all();
            return view('program.program', compact('data', 'chapters','default_chapter','curiculumn'));

        } else if ($request->about) {
            dd('about');

        } else if ($request->alumni) {
            $chapters = Chapter::all();
            $alumnis = Alumni::take(6)->get();
            return view('alumni.alumni',compact('alumnis','chapters'));
        }
        //    $chapter_id = $request->chapter_id;

    }

    public function showAll(){
        $chapters= Chapter::all();
        $teams = Team::all();
        return view('allTeam.allteam',compact('teams','chapters'));

    }

    public function allAlumni(){
        $alumnis = Alumni::all();
        return view('allAlumni.allAlumni',compact('alumnis'));
    }
}


