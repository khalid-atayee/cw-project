<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Team::all();
        return view('admin.team.index',compact('members'));
    }

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
            "major" => "required",
            "role" => "required",
            "short_bio" => "required",
            "photo" => "required|image",
        ]);
        if($request->has('photo')){
            $extesion = $request->photo->extension();
            $filename = rand(100000,10000000) . "." . $extesion;
            Storage::putFileAs('public/team/',$request->photo,$filename,'public');
        }
        Team::create([
            'name' => $request->name,
            'major' => $request->major,
            'role' => $request->role,
            'short_bio' => $request->short_bio,
            'photo' => $filename,
        ]);
        session()->flash('success-message', 'Team record added');
        
        return redirect()->route('team.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('admin.team.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => "required",
            "major" => "required",
            "role" => "required",
            "short_bio" => "required",
        ]);
        if($request->has('photo')){
            Storage::delete('public/team/' . $team->photo);
            $extension = $request->photo->extension();
            $filename = rand(100000,10000000) . "." . $extension;
            Storage::putFileAs('public/team', $request->photo, $filename, 'public');
        }
        $team->name = $request->name;
        $team->major = $request->major;
        $team->role = $request->role;
        $team->short_bio = $request->short_bio;
        $team->photo = $filename ?? $team->photo;
        $team->save();
        session()->flash('success-message', 'Team record updated');

        return redirect()->route('team.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        session()->flash('success-message', 'Team record deleted');

        return redirect()->back();
    }
}
