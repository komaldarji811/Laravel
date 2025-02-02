<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\UsersController;

Route::get('/',[UsersController::class,'index'])->name('index');
Route::get('/register',[UsersController::class,'register'])->name('register');
Route::get('/login',[UsersController::class,'login'])->name('login');
Route::get('/about',[UsersController::class,'about']);
Route::get('/shop',[UsersController::class,'shop']);
Route::get('/contact',[UsersController::class,'contact']);
Route::get('/shop_single',[UsersController::class,'shop_single']);

Route::post('userlogin',[UsersController::class,'userlogin'])->name('userlogin');
Route::post('useregister',[UsersController::class,'useregister'])->name('useregister');
Route::get('logout',[UsersController::class,'logout'])->name('logout');

Route::get('dashboard', [UsersController::class,'dashboard'])->name('dashboard');
Route::post('Contact_register',[UsersController::class,'Contact_register'])->name('Contact_register');



