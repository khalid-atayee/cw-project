<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\Auth\AuthController;

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

// admin panel routes here
Route::get('/dashboard',function(){
    return view('admin.dashboard');
})->name('dashboard');
Route::get('/chapters',[ChapterController::class,'index'])->name('chapters');

//Auth routes 
Route::post('/login',[AuthController::class,'login'])->name('login');