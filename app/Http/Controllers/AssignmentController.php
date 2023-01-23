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
        else
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
