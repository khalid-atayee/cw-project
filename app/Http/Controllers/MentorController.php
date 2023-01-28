<?php

/**
 * 
 *
 * 
 * @author  Khalid Atayee <khalid.atayee101@gmail.com>
 * @description, This controller is responsible for mentors
 */

namespace App\Http\Controllers;

use App\Http\Requests\MailValidation;
use App\Http\Requests\MentorValidation;
use App\Http\Requests\UpdateMentorValidation;
use App\Mail\sendMailCohort;
use App\Models\Chapter;
use App\Models\Mentor;
use App\Models\Organizer;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\UserTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Session;


class MentorController extends Controller
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

            $mentors  = Mentor::with('chapters', 'organizers')->where('chapter_id', Auth::user()->chapter->id)->get();
        }

        if (Auth::user()->roles[0]->name == 'organizer') {
            $mentors  = Mentor::with('chapters', 'organizers')->where('chapter_id', Auth::user()->organizer->chapter_id)->get();
        }

        if (Auth::user()->roles[0]->name == 'admin') {

            $mentors = Mentor::with('chapters', 'organizers')->get();
        }

        return view('admin.mentors.index', compact('mentors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $organizers = Organizer::with('chapters')->get();

        return view('admin.mentors.create', compact('organizers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MentorValidation $request)
    {
        $data = $this->registerOrganizerMentor($request->all(), 'mentor', true);
        if ($data) {
            return redirect()->route('Mentors.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function createMail()
    {
        $chapters = Chapter::all();
        return view('admin.mentors.emailCohort', compact('chapters'));
    }



    public function sendMail(MailValidation $request)
    {
        $chapters = Chapter::find($request->chapter_id);
        $user_id = $chapters->user_id;
        $user_id = User::find($user_id);

        $data = Chapter::with('mentor', 'organizer')->where('id', $request->chapter_id)->get();
        $emails = [];

        array_push($emails, $data[0]->organizer->email);
        array_push($emails, $user_id->email);

        foreach ($data as $singleData) {
            foreach ($singleData->mentor as $value) {

                array_push($emails, $value->email);
            }
        }
        foreach ($emails as $key => $value) {
            if (!empty($emails[$key])) {

                Mail::to($emails[$key])->send(new sendMailCohort($request->all()));
            }
        }
        // Session::flash('success-message', 'Email Sent successully');
        // Session::flash('alert-class', 'alert-danger');
        // $chapters = Chapter::all();

        return redirect()->back();
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

        $organizers = Organizer::with('chapters')->get();
        $mentor = Mentor::find($id);

        return view('admin.mentors.edit', compact('organizers', 'mentor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     
    public function update(UpdateMentorValidation $request, $id)
    {
        $data = $this->UpdateMentor($request->all(), $id);
        if($data){
            return redirect()->route('Mentors.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mentor = Mentor::find($id);
        if (file_exists(Storage::path('public\mentorImage\\' . $mentor->image))) {

            unlink(Storage::path('public\mentorImage\\' . $mentor->image));
        }
        $mentor->delete();
        return back();
    }
}
