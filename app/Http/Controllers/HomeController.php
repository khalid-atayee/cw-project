<?php
/**
 * 
 *
 * 
 * @author  Khalid Atayee <khalid.atayee101@gmail.com>
 * @description, This controller is only for website routing
 */

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

