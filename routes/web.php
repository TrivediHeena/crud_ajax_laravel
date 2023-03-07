<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('students',[StudentsController::class,'index']);
Route::post('/add_student',[StudentsController::class,'store']);
Route::get('/fetchstudents',[StudentsController::class,'fetch_students']);
Route::get('/students/show/{id}',[StudentsController::class,'show']);