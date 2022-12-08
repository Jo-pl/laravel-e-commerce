<?php

use App\Http\Controllers\OrderController;
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
//Products
Route::get('/',[ProductController::class,'index'])->name('home');
Route::get('/product/{product:slug}',[ProductController::class,'show'])->name('product');
Route::get('/products',[ProductController::class,'search'])->name('search_page');
//Orders
Route::get('/order/{product:slug}',[OrderController::class,'create'])->name('add_to_cart')->middleware('auth');
Route::get('/orders',[OrderController::class,'index'])->name('orders');
Route::get('/checkout',[OrderController::class,'show'])->name('checkout_page')->middleware('auth');
Route::post('/checkout',[OrderController::class,'destroy'])->name('checkout')->middleware('auth');
Route::get('/remove_product/{order:id}/{product:id}',[OrderController::class,'update'])->name('removeProduct')->middleware('auth');
//Authentification
Route::get('/login',[SessionController::class,'create'])->name('login_page');
Route::post('/login',[SessionController::class,'store'])->name('login');
Route::get('/logout',[SessionController::class,'destroy'])->name('logout')->middleware('auth');
Route::get('/register',[RegisterController::class,'create'])->name('register_page');
Route::post('/register',[RegisterController::class,'store'])->name('register');