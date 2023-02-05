<?php

use App\Http\Controllers\AssignmentController;

use App\Models\Organizer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\ChapterController;

use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\PaymentGateWayController;

use App\Http\Controllers\ProgramController;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ForgotPassword;
use App\Http\Controllers\OrganizerController;

use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserManagementController;




/*
|-----------------------------------------------
| Here is where you can register web routes fo---------------------------
| Web Routes
|--------------------------------------------------------------------------
|r your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// website links
Route::get('/', [HomeController::class, 'index'])->name('cw-home');
Route::get('alumni', [HomeController::class, 'alumni'])->name('cw-alumni');
Route::get('program', [ProgramController::class, 'index'])->name('cw-program');
Route::post('renderProgram', [ProgramController::class, 'renderData'])->name('program-location');
Route::get('aboutUs', [HomeController::class, 'aboutUs'])->name('cw-about');
Route::get('/news', [NewsController::class, 'news'])->name('news');
Route::get('/news/details', [NewsController::class, 'newsDetails'])->name('newsDetails');

Route::get('/curriculam/{id?}', [HomeController::class, 'curriculam'])->name('cw-curriculam');

Route::post('/location', [HomeController::class, 'find'])->name('cw-location');

// Route::get('/news/details/{news}', [NewsController::class, 'newsDetailsData'])->name('newsDetails');
Route::get('allMember',[HomeController::class, 'showAll'])->name('showAll');
Route::get('allAlumni',[HomeController::class, 'allAlumni'])->name('allAlumni');





// student controller
Route::resource('students', StudentController::class);


// payment controller start here
Route::get('payment', function () {
    return view('payment.payment');
})->name('payment.index');

Route::post('payment', [PaymentGateWayController::class, 'call']);

//Auth routes 
// authentication routes start here
Route::get('/logout', [AuthController::class, 'logout'])->name('authentication.logout');
Route::post('/login', [AuthController::class, 'login'])->name('authentication.login');

// feedbacks
Route::get('feedbacks', [FeedbackController::class, 'feedbacks'])->name('feedbacks');
Route::post('/feedbacksStore', [FeedbackController::class, 'storeFeedback'])->name('feedback.store');


// forgot password

Route::get('/forgotPassword',[ForgotPassword::class,'index'])->name('forgot.index');
Route::post('/storPassword',[ForgotPassword::class,'store'])->name('forgot.store');
Route::post('/verification',[ForgotPassword::class,'verificaiton'])->name('forgot.verification');
Route::post('/changePassword{id?}/update',[ForgotPassword::class,'changePassword'])->name('forgot.change');

Route::group(['middleware' => ['AuthCheck']], function () {
    // admin panel routes here
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resources([
        'chapters' => ChapterController::class,
        'organizers' => OrganizerController::class,
        'Mentors' => MentorController::class,
        'users' => UserManagementController::class,
        'curriculum' => CurriculumController::class,
        'sessions' => SessionController::class,
        'assignments' => AssignmentController::class,
        'alumnis' => AlumniController::class,
        'team' => TeamController::class,
        'cities' => CityController::class,

    ]);


    Route::get('createMail', [MentorController::class, 'createMail'])->name('mentor.createMail');
    Route::post('sendMail', [MentorController::class, 'sendMail'])->name('mentor.sendMail');

    Route::get('notPayedStudents', [StudentController::class, 'notpayed'])->name('students.notPayed');

    Route::post('assignmentSubmit', [AssignmentController::class, 'submitAssignment'])->name('assignments.submit');

    Route::post('sessionCurriculumItem', [SessionController::class, 'curriculumItem'])->name('sessions.item');
    Route::post('submitSessionForm', [SessionController::class, 'submitForm'])->name('sessions.submit');

    Route::post('curriculamForm', [CurriculumController::class, 'postSerializeForm'])->name('curriculum.serializeForm');
    Route::get('admin', [UserManagementController::class, 'adminPage'])->name('users.admin');
    Route::get('orgamizer', [UserManagementController::class, 'organizerPage'])->name('users.organizer');
    Route::get('mentor', [UserManagementController::class, 'mentorPage'])->name('users.mentor');
    Route::get('chapter', [UserManagementController::class, 'chapterPage'])->name('users.chapter');
    Route::get('student', [UserManagementController::class, 'studentPage'])->name('users.student');

    Route::get('/newses', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::post('/news/{news}/update', [NewsController::class, 'update'])->name('news.update');
    Route::post('/news/{news}/trash', [NewsController::class, 'trash'])->name('news.trash');
    ROute::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

 
});



//Auth routes 
// Route::post('/login',[AuthController::class,'login'])->name('login');
// Route::post('/student/registration',[AuthController::class,'studentRegistration'])->name('studentRegistration');
