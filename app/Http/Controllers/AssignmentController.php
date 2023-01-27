<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignmentValidation;
use App\Mail\StudentAssignment;
use App\Models\Assignment;
use App\Models\Chapter;
use App\Models\Grade;
use App\Models\Mentor;
use App\Models\Session;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->roles[0]->name=='chapter'){

            $assignments  = Assignment::with('chapters','students','sessions','mentors','grades')->where('chapter_id',Auth::user()->chapter->id)->get();
        }
        if(Auth::user()->roles[0]->name=='organizer'){
            $assignments  = Assignment::with('chapters','students','sessions','mentors','grades')->where('chapter_id',Auth::user()->organizer->chapter_id)->get();


        }
        if(Auth::user()->roles[0]->name=='mentor'){
            $assignments  = Assignment::with('chapters','students','sessions','mentors','grades')->where('chapter_id',Auth::user()->mentor->chapter_id)->get();


        }
        if(Auth::user()->roles[0]->name=='admin')
        {

            $assignments =Assignment::with('chapters','students','sessions','mentors','grades')->get();
        }
   
        return view('admin.asssignments.index',compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chapters = Chapter::all();
        $grades = Grade::all();

        return view('admin.asssignments.create',compact('chapters','grades'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = DB::table('chapters AS C')->join('sessions AS S','S.chapter_id','=','C.id')->join('students AS St','St.chapter_id','=','C.id')->join('mentors AS M','M.chapter_id','=','C.id')
        // ->select('*')->where('C.id',$request->chapter_id)->get();

        // dd($data);
     
        $sessions = Session::where('chapter_id',$request->chapter_id)->get();
        $mentors = Mentor::where('chapter_id',$request->chapter_id)->get();
        $students = Student::where('chapter_id',$request->chapter_id)->where('payment',1)->get();


        return response()->json([
            'sessions'=>$sessions,
            'mentors'=>$mentors,
            'students'=>$students,
            'status'=>'assignments'
    ],200);

    
        // $data = 
    }

    public function submitAssignment(AssignmentValidation $request){
        $data = Assignment::create($request->all());
        if($data){
            return response()->json(['message'=>'assignment created successfully','status'=>'success'],200);
        }
        else{
            return response()->json(['message'=>'something went wrong plz check network tab','status'=>'error'],200);
            
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
        $emailData =Assignment::with('students','grades','sessions','chapters')->where('id',$id)->first();
        Mail::to($emailData->students->email)->send(new StudentAssignment($emailData));
        return redirect()->back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $assignment = Assignment::find($id);
        $mentors = Mentor::where('chapter_id',$assignment->chapter_id)->get();
        $sessions = Session::where('chapter_id',$assignment->chapter_id)->get();
        $students = Student::where('chapter_id',$assignment->chapter_id)->get();
        $grades = Grade::all();
        $chapters = Chapter::all();
        return view('admin.asssignments.edit',compact('chapters','assignment','mentors','sessions','students','grades'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AssignmentValidation $request, $id)
    {
        $assignment= Assignment::find($id);
        $assignment->title = $request->title;
        $assignment->description = $request->description;
        $assignment->url = $request->url;
        $assignment->chapter_id = $request->chapter_id;
        $assignment->student_id = $request->student_id;
        $assignment->session_id = $request->session_id;
        $assignment->mentor_id = $request->mentor_id;
        $assignment->grade_id = $request->grade_id;
        $assignment->update();
        return redirect()->route('assignments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assignments = Assignment::find($id);
        $assignments->delete();
        return redirect()->route('assignments.index');
    }
}
