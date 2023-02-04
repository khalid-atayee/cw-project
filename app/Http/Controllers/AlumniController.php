<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnis = Alumni::all();
        return view('admin.alumnis.index',compact('alumnis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.alumnis.create');
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
            'name' => 'required|max:255',
            'description' => 'required|max:1000',
            'graduation_year' => 'required|date',
            'photo' => "required|image|",
            'linkedin' => "required|url"
        ]);

        if($request->has('photo')){
            $exension = $request->photo->extension();
            $filename = rand(100000,10000000) . "." . $exension;
            Storage::putFileAs('public/alumnis', $request->file('photo'), $filename);
        }

        Alumni::create([
            'name' => $request->name,
            'description' => $request->description,
            'graduation_year' => $request->graduation_year,
            'photo' => $filename,
            'linkedin' => $request->linkedin
        ]);
        session()->flash('success-message', 'Alumni record added');
    
    
        return redirect()->route('alumnis.index');
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
    public function edit(Alumni $alumni)
    {
        return view('admin.alumnis.edit',compact('alumni'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumni $alumni)
    {
        if($request->has('photo')){
            Storage::delete('public/alumnis/' . $alumni->photo);
            $exension = $request->photo->extension();
            $filename = rand(100000,10000000) . "." . $exension;
            Storage::putFileAs('public/alumnis', $request->file('photo'), $filename);

        }
        $alumni->name = $request->name;
        $alumni->description = $request->description;
        $alumni->graduation_year = $request->graduation_year;
        $alumni->photo = $filename ?? $alumni->photo;
        $alumni->linkedin = $request->linkedin;
        $alumni->save();
        session()->flash('success-message', 'Alumni record updated');

        return redirect()->route('alumnis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumni $alumni)
    {
        $alumni->delete();
        session()->flash('success-message', 'Alumni record deleted');

        return redirect()->back();
    }
}
