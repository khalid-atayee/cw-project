<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news(){
        return view('news.news');
    }

    public function newsDetails(){
        return view('news.newsDetails');
    }
}
