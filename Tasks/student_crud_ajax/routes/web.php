<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/',[StudentController::class,'index'])->name('index');
Route::get('/fetchstudents',[StudentController::class,'fetchstudents'])->name('getstudents');
Route::post('/store',[StudentController::class,'store'])->name('store');
Route::post('/delete',[StudentController::class,'deletestudents'])->name('deletestudents');
