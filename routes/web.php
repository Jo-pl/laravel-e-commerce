<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[ProductController::class,'index'])->name('home');
Route::get('/product/{product:slug}',[ProductController::class,'show'])->name('product');

Route::get('/login',[SessionController::class,'create'])->name('login_page');
Route::post('/login',[SessionController::class,'store'])->name('login');
Route::get('/logout',[SessionController::class,'destroy'])->name('logout');

Route::get('/register',[RegisterController::class,'create'])->name('register_page');
Route::post('/register',[RegisterController::class,'store'])->name('register');
