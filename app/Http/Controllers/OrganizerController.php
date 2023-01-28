<?php

/**
 * 
 *
 * 
 * @author  Khalid Atayee <khalid.atayee101@gmail.com>
 * @description, This controller is only responsible  for organizers
 */

namespace App\Http\Controllers;

use App\Http\Requests\OrganizerValidation;
use App\Http\Requests\UpdateOrganizerValidation;
use App\Models\Chapter;
use App\Models\Organizer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Traits\UserTrait;
use Illuminate\Support\Facades\Auth;

class OrganizerController extends Controller
{
    use UserTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        if(Auth::user()->roles[0]->name=='chapter'){

            $organizers  = Organizer::with('chapters')->where('chapter_id',Auth::user()->chapter->id)->get();
        }
        else{
         $organizers = Organizer::with('chapters')->get();
        }
        return view('admin.organizers.index', compact('organizers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chapters = Chapter::all();
        return view('admin.organizers.create', compact('chapters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrganizerValidation $request)
    {
    

        $data = $this->registerOrganizerMentor($request->all(),'organizer',false);
        if($data){

            return redirect()->route('organizers.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function show(Organizer $organizer)
    {
        return view('admin.organizers.view',compact('organizer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function edit(Organizer $organizer)
    {
        $chapters = Chapter::all();
        return view('admin.organizers.edit',compact('chapters','organizer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrganizerValidation $request, Organizer $organizer)
    {
        $data = $this->UpdateOrganizer($request->all(),$organizer->id);
        if($data){
            return redirect()->route('organizers.index');
        }
        else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organizer $organizer)
    {
     
        if(file_exists(Storage::path('public\organizerImage\\'.$organizer->image))){

            unlink(Storage::path('public\organizerImage\\'.$organizer->image));
        }
        $organizer->delete();
        return redirect()->back();
      
    }
}
