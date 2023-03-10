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

        if (Auth::user()->roles[0]->name == 'chapter') {

            $organizers  = Organizer::with('chapters')->where('chapter_id', Auth::user()->chapter->id)->get();
        } else {
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
        $chapter = Chapter::with('organizer')->where('id',$request->chapter_id)->first();
        if(!is_null($chapter->organizer)){

            session()->flash('fail-message', 'This chapter already has organizer');
            return redirect()->back();
            

        }
        else{

            $data = $this->registerOrganizerMentor($request->all(), 'organizer', false);
            if ($data) {
    
                session()->flash('success-message', 'Organizer record added');
                return redirect()->route('organizers.index');
    
            }
            else{
    
                session()->flash('fail-message', 'something went wrong plz refere to code');
                return redirect()->route('organizers.index');
    
            }
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
        return view('admin.organizers.view', compact('organizer'));
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
        return view('admin.organizers.edit', compact('chapters', 'organizer'));
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
        
        if ($request->has('image')) {
            if (file_exists(Storage::path('public\organizerImage\\' . $organizer->image))) {
                Storage::delete('public/organizerImage/' . $organizer->image);
                
            }
                $image = $request->image;
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/organizerImage', $image_name);
        } else {
            $image_name = $organizer->image;
        }
        $data = $this->UpdateOrganizer($request->all(),$organizer->id, $image_name);
        if ($data) {
            session()->flash('success-message', 'Organizer record updated');
            return redirect()->route('organizers.index');
        } else {
            session()->flash('fail-message', 'something went wrong plz refere to code');
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

        if (file_exists(Storage::path('public\organizerImage\\' . $organizer->image))) {

            Storage::delete('public/organizerImage/' . $organizer->image);
        }
        $organizer->delete();
        session()->flash('success-message', 'Organizer record deleted');
        return redirect()->back();
    }
}
