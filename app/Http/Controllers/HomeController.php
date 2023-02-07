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
use App\Models\Faq;
use App\Models\News;
use App\Models\Team;

use Illuminate\Http\Request;

class HomeController extends Controller
{


    function index()
    {

        $default_chapter = Chapter::take(1)->get();
        $chapters = Chapter::all();
        $teams = Team::take(4)->get();
        $newses = News::take(3)->get();
        $faqs = Faq::take(4)->get();
        $check = 'program';
        return view('home.home', compact('chapters', 'teams','default_chapter', 'check','newses','faqs'));
    }

    function alumni()
    {

        $chapters = Chapter::all();
        $alumnis = Alumni::take(6)->get();
        $newses = News::take(3)->get();
        return view('alumni.alumni', compact('chapters', 'alumnis','newses'));

        // return view('alumni.alumni',compact('alumnis'));

    }

    function aboutUs()
    {

        $chapters = Chapter::all();
        $alumnis = Alumni::take(6)->get();
        $newses = News::take(3)->get();
        return view('about.aboutUs', compact('chapters', 'alumnis','newses'));
    }

    function curriculam($id)
    {
       
        $data = Chapter::find($id);

        $chapters = Chapter::all();
        $newses = News::take(3)->get();
        return view('curriculam.curriculamIndex', compact('chapters','data','newses'));
    }

    function find(Request $request)
    {
        
        if ($request->home) {
            $data = Chapter::where('id', $request->home)->first(['title', 'city_id']);
            $chapters = Chapter::all();
            $teams = Team::all();
            $check = 'location';
            $newses = News::take(3)->get();
            $faqs = Faq::take(4)->get();

            return view('home.home', compact('chapters', 'data', 'teams','check','newses','faqs'));

        } else if ($request->program) {
            $data = Chapter::with('organizer', 'mentor', 'curriculumTemplate')->where('id', $request->program)->first();
            $check = 'location';
            $chapters = Chapter::all();
            $newses = News::take(3)->get();
            $faqs = Faq::take(4)->get();
            return view('program.program', compact('data', 'chapters','check','newses','faqs'));

        } else if ($request->about) {

            $chapters = Chapter::all();
            $alumnis = Alumni::take(6)->get();
            $newses = News::take(3)->get();
            return view('about.aboutUs',compact('alumnis','chapters','newses'));

        } else if ($request->alumni) {
            $chapters = Chapter::all();
            $alumnis = Alumni::take(6)->get();
            $newses = News::take(3)->get();
            return view('alumni.alumni',compact('alumnis','chapters','newses'));
        }

        else if ($request->register){
            $chapters = Chapter::all();
            $newses = News::take(3)->get();
            return view('register.studentRegister',compact('chapters','newses'));
        }
        //    $chapter_id = $request->chapter_id;

    }

    public function showAll(){
        $chapters= Chapter::all();
        $teams = Team::all();
        $newses = News::take(3)->get();
        return view('allTeam.allteam',compact('teams','chapters','newses'));

    }

    public function allAlumni(){
        $alumnis = Alumni::all();
        $newses = News::take(3)->get();
        return view('allAlumni.allAlumni',compact('alumnis','newses'));
    }
}


