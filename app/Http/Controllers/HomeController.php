<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    function index(){
        $members = Team::all();
        $first = Team::first();
        return view('home.home', compact('members','first'));

    }

    function alumni(){
        $alumnis = Alumni::all();
        return view('alumni.alumni',compact('alumnis'));
    }
    function aboutUs(){
        $alumnis = Alumni::all();
        return view('about.aboutUs', compact('alumnis'));
    }
    function curriculam(){
        return view('curriculam.curriculamIndex');

    }
  
}

