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
Route::get('/products',[ProductController::class,'search_view'])->name('search_page');
Route::post('/products',[ProductController::class,'search'])->name('search_products');
//Orders
Route::get('/order/{product:slug}',[OrderController::class,'create'])->name('add_to_cart')->middleware('auth');
Route::get('/orders',[OrderController::class,'index'])->name('orders_view')->middleware('auth');
Route::post('/orders',[OrderController::class,'search'])->name('search')->middleware('auth');
Route::post('/update_order',[OrderController::class,'update'])->name('update_order')->middleware('auth');
Route::get('/checkout',[OrderController::class,'show'])->name('checkout_page')->middleware(['auth','valid_order']);
Route::post('/checkout',[OrderController::class,'update'])->name('checkout')->middleware('auth','valid_order');
Route::get('/delete_order/{order:id}',[OrderController::class,'destroy'])->name('delete_order')->middleware('auth');
//Authentification
Route::get('/login',[SessionController::class,'create'])->name('login_page');
Route::post('/login',[SessionController::class,'store'])->name('login');
Route::get('/logout',[SessionController::class,'destroy'])->name('logout')->middleware('auth');
Route::get('/register',[RegisterController::class,'create'])->name('register_page');
Route::post('/register',[RegisterController::class,'store'])->name('register');