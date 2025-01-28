<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\Countrycontroller;

Route::get('/',[Countrycontroller::class,'index']);
Route::get('/get-states',[Countrycontroller::class,'getstates']);
Route::get('/get-cities',[Countrycontroller::class,'getcities']);