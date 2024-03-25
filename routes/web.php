<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/student',[StudentController::class,'create'])->name('student');
Route::post('/student',[StudentController::class,'store']);
Route::get('/student/index',[StudentController::class,'index'])->name('student.index');
Route::get('/student/{id}/edit',[StudentController::class,'edit'])->name('student.edit');
Route::post('/student/{id}/update',[StudentController::class,'update'])->name('student.update');
Route::get('/student/{id}/delete',[StudentController::class,'delete'])->name('student.delete');
