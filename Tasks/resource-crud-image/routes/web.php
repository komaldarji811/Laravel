<?php

use App\http\controllers\Studentcontroller;
use Illuminate\Support\Facades\Route;

Route::resource('student',Studentcontroller::class);