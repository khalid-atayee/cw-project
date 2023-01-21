<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all()); 

        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'gender' => 'required',
                'dob' => 'required',
                'location' => 'required',
                'contact' => 'required',
                'email' => 'required',
                'password' => 'required',
                'chapter' => 'required',
                'education' => 'required',
                'experiance' => 'required'

            ],
            [

                'firstname.required' => 'First name is required',
                'lastname.required' => 'Last name is required',
                'gender.required' => 'Gender is required',
                'dob.required' => 'Date of birth is required',
                'location.required' => 'Please specify your location',
                'contact.required' => 'Contact is required',
                'email.required' => 'Email is required',
                'password.required' => 'Password is required',
                'chapter.required' => 'Please specify the required',
                'education.required' => 'Please tell us about your Education background',
                'experiance.required' => 'Please tell us about your experience',

            ]

        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        DB::beginTransaction();
        try {
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



// class AuthController extends Controller
// {
    
//     public function login(){
//         if(Auth::user()){
//             return redirect()->route('dashboard');
//         }
//         return view('auth.login');
//     }

//     public function authenticate(Request $request){
//         // $user = User::where('email',$request->email)->first();
//         // dd($user);
//         $credentials = $request->validate([
//             'email' => ['required','email','max:255'],
//             'password' => ['required'],
//         ]);

//         if(Auth::attempt($credentials)){
//             $request->session()->regenerate();
//             return redirect()->route('dashboard');
//         }

//         return redirect()->back()->with('message','email or password incorrect');
//     }

//     public function register(){
//         if(Auth::user()){
//             return redirect()->route('dashboard');
//         }
//         return view('auth.register');
//     }

//     public function registeration(Request $request){
//         // dd($request->all());
//         $request->validate([
//             'name' => ['required','string','max:255'],
//             'lastname' => ['required','string','max:255'],
//             'email' => ['required','string','max:255','unique:users,email'],
//             'password' => ['required','confirmed'],
//         ]);

//         $user = User::create([
//             'name' => $request->name,
//             'lastname' => $request->lastname,
//             'email' => $request->email,
//             'password' => Hash::make($request->password),
//         ]);
       
//         if($user){
//             $request->session()->regenerate();
//             Auth::login($user);
//             return redirect()->route('dashboard');
//         }
        

//     }

//     public function logout(){
//         Auth::logout();
//         request()->session()->invalidate();
//         request()->session()->regenerateToken();
//         return redirect('/login');
//     }

//     public function profile(){

//         return view('profile.updateProfile');
//     }

//     public function updateProfile(Request $request,$id){

//         $user = User::find($id);
        
//         $user->name = $request->name;
//         $user->lastname= $request->lastname;
//         $user->email = $request->email;
//         $user->phone = $request->phone;
//         $user->address = $request->address;
//         $user->province = $request->province;
        // if($request->has('photo')){
 
        //     $extension = $request->photo->extension();
        //     $filename = now() . rand(10000,1000000) . "." . $extension;
        //     $request->file('photo')->storeAs('photo', $filename,'public');
        //     $user->photo = $filename;
        // }
        // if($request->has('photo')){
        //     Storage::delete('public/'. $user->photo);
        //     $location = $request->file('photo')->store('profile', 'public');
        //     // dd($location);
        //     $user->photo = $location;
        //   }
        
        // $user->save();

        // return back()->with('message','Profile updated');


        // $user = User::update([
        //     'name' => $request->name,
        //     'lastname' => $request->lastname,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'address' => $request->address,
        //     'province' => $request->province,
        //     'photo' => $filename,
        // ]);
//     }
// }
