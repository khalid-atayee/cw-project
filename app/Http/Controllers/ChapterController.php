<?php

/**
 * 
 *
 * 
 * @author  Khalid Atayee <khalid.atayee101@gmail.com>
 * @description, This controller is only for chapters
 */

namespace App\Http\Controllers;

use App\Http\Requests\chaptervalidation;
use App\Http\Requests\UpdateChapterValidation;
use App\Models\City;
use App\Models\Chapter;
use App\Models\Team;
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


        return view('admin.chapters.index', compact('chapters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('admin.chapters.create', compact('cities'));
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

        if ($data) {
            $chapters = Chapter::all();

            session()->flash('success-message', 'Chapter record added');
            return view('admin.chapters.index', compact('chapters'));
        } else {
            session()->flash('fail-message', 'something went wrong plz refere to code');
            return redirect()->back();
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
        // dd($chapter->curriculumTemplate);
        return view('admin.chapters.view', compact('chapter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapter $chapter)
    {
        $chpater = Chapter::with('city')->where('id', $chapter->id)->first();
        $cities = City::all();
        return view('admin.chapters.edit', compact('chapter', 'cities'));
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
        $data = $this->updateChapter($request->all(), $chapter->id);
        if ($data) {
            session()->flash('success-message', 'Chapter record updated');
            return redirect()->route('chapters.index');
        }
        else{
            session()->flash('fail-message', 'something went wrong plz refere to code');
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
        session()->flash('success-message', 'Chapter record deleted');
        return redirect()->back();
    }
}
