<?php
use App\http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('/',UserController::class);
