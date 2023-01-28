<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Mentor;
use App\Models\Organizer;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $chapter = Chapter::count();
        $organizers = Organizer::count();
        $mentors = Mentor::count();
        $student_with_payment = Student::where('payment',1)->count();
        $student_with_not_payment = Student::where('payment',0)->count();

        $chapters = Chapter::with('organizer','mentor','students')->get();
        
     
        return view('admin.dashboard',compact('chapter','organizers','mentors','student_with_payment','student_with_not_payment','chapters'));
    }
}
