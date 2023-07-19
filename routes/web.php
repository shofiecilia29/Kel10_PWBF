<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[\App\Http\Controllers\Homecontroller::class, 'index'])->name('homepage');
Route::get('/shop',[\App\Http\Controllers\Shopcontroller::class, 'index'])->name('shop.index');
Route::get('/product',[\App\Http\Controllers\Productcontroller::class, 'show'])->name('product.show');

Route::resource('/cart',\App\Http\Controllers\CartController::class);

Route::get('/order/checkout',[\App\Http\Controllers\OrderController::class, 'process'])->name('checkout.process');

Route::group(['middleware' => ['auth','isAdmin'],'prefix' => 'admin'], function(){
    Route::get('/',[\App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');

    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
