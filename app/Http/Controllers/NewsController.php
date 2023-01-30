<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news(){
        $chapters = Chapter::all();
        return view('news.news',compact('chapters'));
    }

    public function newsDetails(){
        $chapters = Chapter::all();
        return view('news.newsDetails',compact('chapters'));
    }
}
