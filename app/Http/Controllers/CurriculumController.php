<?php

namespace App\Http\Controllers;

use App\Http\Requests\curriculumValidations;
use App\Models\Chapter;
use App\Models\CurriculamTemplate;
use App\Models\Mentor;
use Illuminate\Http\Request;
use App\Traits\HomeTrait;


class CurriculumController extends Controller
{
    use HomeTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curriculumTemplates = CurriculamTemplate::with('organizers','chapters')->get();
        // dd($curriculumTemplates);
        return view('admin.curriculam.index',compact('curriculumTemplates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chapters = Chapter::all();
        return view('admin.curriculam.create',compact('chapters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mentors = Mentor::where('chapter_id',$request->chapter_id)->get();
        return response()->json(['data'=>$mentors],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function postSerializeForm(curriculumValidations $request){
    $data=$this->postCurriculam($request->all());
    if($data){
        return response()->json(['message'=>'curriculum successfully created','status'=>'success'],200);
    }
    else {
        return response()->json(['message'=>'something went wrong','status'=>'error'],200);
    }

   

    
    }
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
        //
    }
}
