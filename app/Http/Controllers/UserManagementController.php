<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminValidation;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\UserTrait;

class UserManagementController extends Controller
{
    use UserTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereHas(
            'roles', function($q){
                $q->where('name', 'admin');
                $q->where('name', 'organizer');
                $q->where('name', 'mentor');
                $q->where('name', 'chapter');
                $q->where('name', 'student');
            }
        )->get();

        $users = User::all();
        // $flag = false;
        return view('admin.userManagement.index',['users'=>$users,'flag'=>false,'authorityCheck'=>
    'all']);
    }

    public function adminPage(){
        $users = User::whereHas(
            'roles', function($q){
                $q->where('name', 'admin');
            }
        )->get();
        return view('admin.userManagement.index',['users'=>$users,'flag'=>true,'authorityCheck'=>'admin']);
    }

    public function organizerPage(){
        $users = User::whereHas(
            'roles', function($q){
                $q->where('name', 'organizer');
            }
        )->get();
        
        return view('admin.userManagement.index',['users'=>$users,'flag'=>true,'authorityCheck'=>'organizer']);

    }

    public function mentorPage(){
        $users = User::whereHas(
            'roles', function($q){
                $q->where('name', 'mentor');
            }
        )->get();

        return view('admin.userManagement.index',['users'=>$users,'flag'=>true,'authorityCheck'=>'mentor']);

    }

    public function chapterPage(){
            $users = User::whereHas(
                'roles', function($q){
                    $q->where('name', 'chapter');
                }
            )->get();
    
            return view('admin.userManagement.index',['users'=>$users,'flag'=>true,'authorityCheck'=>'chapter']);

    }

    public function studentPage(){
        $users = User::whereHas(
            'roles', function($q){
                $q->where('name', 'student');
            }
        )->get();

        return view('admin.userManagement.index',['users'=>$users,'flag'=>true,'authorityCheck'=>'student']);

}

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.userManagement.createAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminValidation $request)
    {
        $data = $this->registerAdmin($request->all());
        if($data){
            return redirect()->route('users.index');
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