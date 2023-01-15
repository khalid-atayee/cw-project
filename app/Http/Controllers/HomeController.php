<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{


    function index(){
        return view('home.home');

    }

    function alumni(){
        return view('alumni.alumni');
    }
    function aboutUs(){
        return view('about.aboutUs');
    }
    function curriculam(){
        return view('curriculam.curriculamIndex');

    }
  
}

