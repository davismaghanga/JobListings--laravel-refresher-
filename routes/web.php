<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Models\Job;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;

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
Route::get('test', function (){
    $job = Job::first();
    TranslateJob::dispatch($job);
});

Route::view('/','home');

//Route::resource('jobs',JobController::class)->middleware('auth'); //index,create,show,store,edit,update,destroy
Route::get('/jobs',[JobController::class, 'index']);
Route::get('/jobs/create',[JobController::class,'create']);
Route::post('/jobs',[JobController::class,'store'])->middleware('auth');
Route::get('/jobs/{job}',[JobController::class,'show']);

Route::get('/jobs/{job}/edit',[JobController::class,'edit'])
    ->middleware('auth')
    ->can('edit-job','job');

Route::patch('/jobs/{job}',[JobController::class,'update']);
Route::delete('/jobs/{job}',[JobController::class,'destroy']);


//Auth
Route::get('/register',[RegisteredUserController::class,'create']);
Route::post('/register',[RegisteredUserController::class,'store']);

Route::get('/login',[SessionController::class,'create'])->name('login');
Route::post('/login',[SessionController::class,'store']);
Route::post('/logout',[SessionController::class,'destroy']);




Route::view('/contact','contact');
