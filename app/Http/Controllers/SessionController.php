<?php
/**
 * 
 *
 * 
 * @author  Khalid Atayee <khalid.atayee101@gmail.com>
 * @description, This controller is only for session purposes
 */
namespace App\Http\Controllers;

use App\Http\Requests\sessionValidation;
use App\Models\Chapter;
use App\Models\CurriculamTemplate;
use App\Models\CurriculamTemplateItem;
use App\Models\Mentor;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->roles[0]->name=='chapter'){

            $sessions  = Session::with('chapter','organizer')->where('chapter_id',Auth::user()->chapter->id)->get();
        }
        if(Auth::user()->roles[0]->name=='organizer'){
            $sessions  = Session::with('chapter','organizer')->where('chapter_id',Auth::user()->organizer->chapter_id)->get();


        }

        if(Auth::user()->roles[0]->name=='mentor'){
            $sessions  = Session::with('chapter','organizer')->where('chapter_id',Auth::user()->mentor->chapter_id)->get();


        }
        if(Auth::user()->roles[0]->name=='admin'){
             $sessions = Session::with('chapter','organizer')->get();
        }
   
        return view('admin.sessions.index',compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chapters = Chapter::all();

        return view('admin.sessions.create',compact('chapters'));
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
            $curriculum = CurriculamTemplate::where('chapter_id',$request->chapter_id)->get();
            return response()->json(['mentors'=>$mentors ,'curriculum'=>$curriculum , 'status'=>300],200);
    }



    public function curriculumItem(Request $request){
        $data = CurriculamTemplateItem::where('curriculam_template_id',$request->chapter_id)->get();
        return response()->json(['data'=>$data , 'status'=>'curriculumItem'],200);
    }



    public function submitForm(sessionValidation $request){
        $data = Session::create($request->all());
        if($data){
            return response()->json(['message'=>'session created successfully','status'=>'success'],200);
        }
        else
        {
            return response()->json(['message'=>'something went wrong plz check the code','status'=>'error'],200);
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
        $session = Session::find($id);
        $mentors = Mentor::where('chapter_id',$session->chapter_id)->get();
        $curriculums = CurriculamTemplate::where('chapter_id',$session->chapter_id)->get();
        $curriculum_items = CurriculamTemplateItem::where('curriculam_template_id',$session->curriculam_template_id)->get();


        // ++++===========
        $chapters = Chapter::all();
        // $session = Session::with('mentor')->where('id',$id)->get();
        // dd($session[0]->mentor->name);
        return view('admin.sessions.edit',compact('chapters','session','mentors','curriculums','curriculum_items'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(sessionValidation $request, $id)
    {
        $session = Session::find($id);
        $session->title = $request->title;
        $session->description = $request->description;
        $session->start_date = $request->start_date;
        $session->end_date = $request->end_date;
        $session->chapter_id = $request->chapter_id;
        $session->mentor_id = $request->mentor_id;
        $session->curriculam_template_id = $request->curriculam_template_id;
        $session->curriculam_template_item_id = $request->curriculam_template_item_id;
        $session->update();
        session()->flash('success-message', 'Session record updated');
        
        return redirect()->route('sessions.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = Session::find($id);
        $session->delete();
        session()->flash('success-message', 'Session record deleted');

        return redirect()->back();
    }
}
