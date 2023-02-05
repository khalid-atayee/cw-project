<?php

namespace App\Http\Controllers;


use App\Models\Chapter;

use App\Models\News;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function news()
    {

        $newses = News::all();
        $first = News::first();
        return view('news.news', compact('newses','first'));
    }

    public function newsDetails(News $news)
    {
        $chapters = Chapter::all();
        $newses = News::all();
        return view('news.newsDetails', compact('news','newses','chapters'));

        // $newses = News::all();
        // $firstNews = News::latest()->first();
        // return view('news.news',compact('newses','firstNews'));
    }

    public function newsDetailsData(News $news)
    {
        $newses = News::all();

        return view('news.newsDetails', compact('news', 'newses'));
    }

    public function index()
    {
        $newses = News::all();

        // dd($firstNews);
        return view('admin.news.index', compact('newses'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => "required",
            'description' => 'required',
            'photo' => "required|image",
        ]);

        if ($request->has('photo')) {
            $extension = $request->photo->extension();
            $filename = rand(100000, 100000000) . "." . $extension;
            Storage::putFileAs('public/posts', $request->photo, $filename, 'public');
        }

        News::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $filename
        ]);

        return redirect()->route('news.index');
    }

    public function edit(News $news)
    {

        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => "required",
            'description' => "required",
            'photo' => "image",
        ]);
        if ($request->has('photo')) {
            $extension = $request->photo->extension();
            $filename = rand(100000, 100000000) . "." . $extension;
            Storage::delete('public/posts/' . $news->image);
            Storage::putFileAs('public/posts', $request->photo, $filename, 'public');
        }

        $news->title = $request->title;
        $news->description = $request->description;
        $news->image = $filename ?? $news->image;
        $news->save();

        return redirect()->route('news.index');
    }

    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    public function trash(News $news)
    {
        // dd("ok");
        $news->delete();
        return redirect()->route('news.index');
    }
}
