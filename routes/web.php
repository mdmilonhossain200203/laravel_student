<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;



// student crud

Route::get('/', [StudentController::class,'index']);
Route::get('/create', [StudentController::class,'create']);
Route::post('/store', [StudentController::class,'store']);
Route::get('/show/{id}', [StudentController::class,'show']);
Route::get('/edit/{id}', [StudentController::class,'edit']);
Route::PUT('/update/{id}', [StudentController::class,'update']);
Route::delete('/delete/{id}', [StudentController::class,'destroy']);
Route::get('/search', [StudentController::class,'search']);


// course crud

Route::get('/course',[CourseController::class,'index']);
Route::get('/course/create',[CourseController::class,'create']);
Route::post('/course/store',[CourseController::class,'store']);
Route::get('/course/show',[CourseController::class,'show']);
Route::get('/course/edit/{id}',[CourseController::class,'edit']);
Route::post('/course/update/{id}',[CourseController::class,'update']);
