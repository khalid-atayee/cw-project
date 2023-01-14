<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PaymentGateWayController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('cw-home');
Route::get('alumni',[HomeController::class,'alumni'])->name('cw-alumni');
Route::get('program',[ProgramController::class,'index'])->name('cw-program');
Route::get('aboutUs',[HomeController::class,'aboutUs'])->name('cw-about');
Route::get('/news',[NewsController::class,'news'])->name('news');
Route::get('/news/details',[NewsController::class,'newsDetails'])->name('newsDetails');
Route::get('/curriculam',[HomeController::class,'curriculam'])->name('cw-curriculam');

// student controller
Route::resource('students',StudentController::class);


// payment controller start here
Route::get('payment', function (){
    return view('payment.payment');
    
})->name('payment.index');

Route::post('payment',[PaymentGateWayController::class, 'call']);





//Auth routes 
// authentication routes start here
Route::get('/logout',[AuthController::class , 'logout'])->name('authentication.logout');


Route::post('/login',[AuthController::class,'login'])->name('authentication.login');
Route::group(['middleware'=>['AuthCheck']], function(){
    // admin panel routes here
    Route::get('/dashboard',function(){
        return view('admin.dashboard');
    })->name('dashboard');
    
});