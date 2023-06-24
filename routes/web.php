<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


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

//Route::get('/user-profile', function () {
//    return view('user-profile');
//});


Route::get('user-profile', [\App\Http\Controllers\UserController::class,'profile']);

Route::get('register', [\App\Http\Controllers\UserController::class,'profile']);


Route::get('projects',[\App\Http\Controllers\ProjectController::class,'index']);

Route::post('/projects/create-project', [\App\Http\Controllers\ProjectController::class, 'create'])->name('projects.create-project');

Route::post('test',[\App\Http\Controllers\ProjectController::class,'index']);

Route::group(['middleware' => ['auth'] ], function () {

	Route::get('/', function () {
	    return view('Dashboard');
	})->name('dashboard');
});

Auth::routes(['verify' => false]);

