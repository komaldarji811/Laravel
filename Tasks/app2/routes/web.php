<?php
use  App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class, "index"]);

Route::post('/store',[StudentController::class, "store"]);

Route::get('/create', [StudentController::class, "create"]);

Route::get('/view/{id}', [StudentController::class, "show"]);
Route::get('/edit/{id}', [StudentController::class, "edit"]);
Route::post('/update/{id}', [StudentController::class, "update"]);
Route::post('/delete/{id}', [StudentController::class, "destroy"]);


