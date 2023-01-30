<?php

/**
 * 
 *
 * 
 * @author  Khalid Atayee <khalid.atayee101@gmail.com>
 * @description, This controller is only for student purposes
 */

namespace App\Http\Controllers;

use App\Http\Requests\StudentValidation;
use App\Models\Chapter;
use App\Models\Organizer;
use App\Models\Student;
use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $chapters = Chapter::all();
        return view('register.studentRegister',compact('chapters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->roles[0]->name=='chapter'){

            $students  = Student::with('chapters.organizer')->where('payment',1)->where('chapter_id',Auth::user()->chapter->id)->get();
        }

        if(Auth::user()->roles[0]->name=='organizer'){
            $students  = Student::with('chapters.organizer')->where('payment',1)->where('chapter_id',Auth::user()->organizer->chapter_id)->get();


        }
        if(Auth::user()->roles[0]->name=='mentor'){
            $students  = Student::with('chapters.organizer')->where('payment',1)->where('chapter_id',Auth::user()->mentor->chapter_id)->get();


        }


        if(Auth::user()->roles[0]->name=='admin')
    
        {
        $students = Student::with('chapters.organizer')->where('payment',1)->get();
        }
        return view('admin.students.indexPayed',compact('students'));
    }

    public function notpayed(){
        if(Auth::user()->roles[0]->name=='chapter'){

            $students  = Student::with('chapters.organizer')->where('payment',0)->where('chapter_id',Auth::user()->chapter->id)->get();
        }
        if(Auth::user()->roles[0]->name=='organizer'){
            $students  = Student::with('chapters.organizer')->where('payment',0)->where('chapter_id',Auth::user()->organizer->chapter_id)->get();


        }

        if(Auth::user()->roles[0]->name=='mentor'){
            $students  = Student::with('chapters.organizer')->where('payment',0)->where('chapter_id',Auth::user()->mentor->chapter_id)->get();


        }
        if(Auth::user()->roles[0]->name=='admin')
        {
        $students = Student::with('chapters.organizer')->where('payment',0)->get();
        }
        return view('admin.students.indexNotPayed',compact('students'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentValidation $request)
    {
        DB::beginTransaction();
        try {
            // dd($request->chapter);
            $organizer_id = Organizer::where('chapter_id',$request->chapter)->first(['id']);
            if(!$organizer_id){
                return response()->json(['message'=>'Organizer did not assigned to this chapter yet, please wait for a while' ,'status'=>'error'],200);
            }
            $user = new User();
            $user->name = $request->firstname . $request->lastname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();


            $lastUser = User::orderBy('id', 'desc')->first();
            $role = Role::where('name','=','student')->first();
            $lastUser->assignRole([$role->id]);

            if($user){

                $student = new Student(); 
                $student->fname = $request->firstname;
                $student->lname = $request->lastname;
                $student->gender = $request->gender;
                $student->dob = $request->dob;
                $student->location = $request->location;
                $student->phone = $request->contact;
                $student->email = $request->email;
                $student->user_id= $lastUser->id;
                $student->chapter_id = $request->chapter;
                $student->inroduction = $request->education;
                $student->experiance_educationLevel = $request->experiance;
                $student->save();

                if ($student) {
                  
                    if ($lastUser) {
                        $request->session()->regenerate();
                        Auth::login($user);
                    }
                    DB::commit();
                    return response()->json(['message' => 'your data successfully recorded'], 200);
            }

            }
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['message'=>'Something went wrong...' ,'status'=>410],200);
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
        $students  = Student::find($id);
        $students->payment=1;
        $students->save();
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



