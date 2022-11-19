<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Studentcontroller;
use App\Http\Controllers\Homecontroller;
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

Route::get('/student',[Studentcontroller::class,'index']);
Route::post('/student/store',[Studentcontroller::class,'store']);
Route::post('/student/edit/{id}',[Studentcontroller::class,'edit']);
Route::post('/student/show/{id}',[Studentcontroller::class,'show']);
Route::post('/student/update',[Studentcontroller::class,'update']);
Route::delete('/student/delete/{id}',[Studentcontroller::class,'destroy']);

