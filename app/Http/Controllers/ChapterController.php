<?php

namespace App\Http\Controllers;

use App\Http\Requests\chaptervalidation;
use App\Http\Requests\UpdateChapterValidation;
use App\Models\City;
use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Traits\UserTrait;
class ChapterController extends Controller
{
    use UserTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapters = Chapter::with('city')->get();
       
        return view('admin.chapters.index',compact('chapters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('admin.chapters.create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(chaptervalidation $request)
    {   
        $data = $this->registerChapter($request->all());

        if($data){
            $chapters = Chapter::all();
       
            return view('admin.chapters.index',compact('chapters'));
          
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function show(Chapter $chapter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapter $chapter)
    {
        $chpater = Chapter::with('city')->where('id',$chapter->id)->first();
        $cities = City::all();
        return view('admin.chapters.edit',compact('chapter','cities'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChapterValidation $request, Chapter $chapter)
    {
        $data = $this->updateChapter($request->all(),$chapter->id);
        if($data){
            return redirect()->route('chapters.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapter $chapter)
    {
        // dd($chapter);
        $chapter->delete();
        return redirect()->back();
    }
}
