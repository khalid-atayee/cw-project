<?php

namespace App\Http\Controllers;

use App\Http\Requests\MentorValidation;
use App\Models\Chapter;
use App\Models\Mentor;
use App\Models\Organizer;
use Illuminate\Http\Request;
use App\Traits\UserTrait;
use Illuminate\Support\Facades\Auth;

class MentorController extends Controller
{
    use UserTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // if(Auth::user()->roles[0]->name=='chapter'){
        //     $chapters = Auth::user()->chapter;
        //     dd($chapters);
        //     return view('admin.organizers.chapterIndex'$chapters);


        // }
        //
        if(Auth::user()->roles[0]->name=='chapter'){

            $mentors  = Mentor::with('chapters','organizers')->where('chapter_id',Auth::user()->chapter->id)->get();
        }
        else{

            $mentors = Mentor::with('chapters','organizers')->get();
        }

        return view('admin.mentors.index', compact('mentors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $organizers = Organizer::with('chapters')->get();
        return view('admin.mentors.create',compact('organizers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MentorValidation $request)
    {
        $data = $this->registerOrganizerMentor($request->all(),'mentor',true);
        if($data){
            $mentors = Mentor::all();
            return view('admin.mentors.index',compact('mentors'));
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mentor = Mentor::find($id);
        $mentor->delete();
        return back();
    }
}
