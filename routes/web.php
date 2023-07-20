<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Admin\CategoryController;

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
Route::get('/shop/{slug?}',[\App\Http\Controllers\Shopcontroller::class, 'index'])->name('shop.index');
Route::get('/shop',[\App\Http\Controllers\Shopcontroller::class, 'index'])->name('shop.index');
Route::get('/shop/tag/{slug?}', [\App\Http\Controllers\ShopController::class, 'tag'])->name('shop.tag');
Route::get('/product',[\App\Http\Controllers\Productcontroller::class, 'show'])->name('product.show');

Route::resource('/cart',\App\Http\Controllers\CartController::class);

Route::get('/order/checkout',[\App\Http\Controllers\OrderController::class, 'process'])->name('checkout.process');

Route::group(['middleware' => ['auth','isAdmin'],'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('/',[\App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');
    
    //categories
    Route::resource('categories',\App\Http\Controllers\Admin\CategoryController::class);
    Route::post('categories/image',[\App\Http\Controllers\Admin\CategoryController::class,'storeImage'])->name('categories.storeImage');

    //tags
    Route::resource('tags', \App\Http\Controllers\Admin\TagController::class);
});

    

    // Route::resource('categories', CategoryController::class);
    // Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    // Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    // Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    // Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    // Route::put('categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    // Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
