<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    function index(){
        $default_chapter = Chapter::take(1)->get();
        $curiculumn = Chapter::with('organizer', 'mentor', 'curriculumTemplate')->take(1)->get();
        $check = 'program';
        $chapters = Chapter::all();
        return view('program.program',compact('chapters','default_chapter','curiculumn','check'));
    }
    
}
