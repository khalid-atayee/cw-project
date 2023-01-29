<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    function index(){
        $chapters = Chapter::all();
        return view('program.program',compact('chapters'));
    }
    
}
