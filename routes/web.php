<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;


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

Route::get('/', function () {
    return view('guest.login');
    });

    Route::get('register', function () {
        return view('guest.register');
        });

Route::get('home', [WebsiteController::class, 'index'])->name('home');
Route::get('product-view/{id}/view', [WebsiteController::class, 'view'])->name('view');

Route::post('add-cart',[App\Http\Controllers\CartController::class,'addCart']);
Route::get('cart-create',[App\Http\Controllers\CartController::class,'create']);
Route::post('place-order',[App\Http\Controllers\CartController::class,'placeOrder']);
Route::get('cart-product/{id}/delete', [App\Http\Controllers\CartController::class, 'delete'])->name('cart.product.delete');

Route::post('loginCheck',[App\Http\Controllers\LoginController::class,'loginCheck']);
Route::post('user',[App\Http\Controllers\LoginController::class,'store']);
Route::get('logout',[App\Http\Controllers\LoginController::class,'logout']);
Route::get('dashboard',[App\Http\Controllers\LoginController::class,'dashboard']);

Route::get('products',[App\Http\Controllers\ProductController::class,'index'])->name('products.index');
Route::get('product-create',[App\Http\Controllers\ProductController::class,'create'])->name('products.create');
Route::post('product-store',[App\Http\Controllers\ProductController::class,'store'])->name('products.store');
Route::get('product/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
Route::post('product-update',[App\Http\Controllers\ProductController::class,'update'])->name('products.update');
Route::get('product/{id}/delete', [App\Http\Controllers\ProductController::class, 'delete'])->name('product.delete');

Route::get('product-details',[App\Http\Controllers\ProductDetailsController::class,'index'])->name('product.details.index');
Route::get('product-details-create',[App\Http\Controllers\ProductDetailsController::class,'create'])->name('product.details.create');
Route::post('product-details-store',[App\Http\Controllers\ProductDetailsController::class,'store'])->name('product.details.store');
Route::get('product-details/{id}/edit', [App\Http\Controllers\ProductDetailsController::class, 'edit'])->name('product.edit');
Route::post('product-details-update',[App\Http\Controllers\ProductDetailsController::class,'update'])->name('product.details.update');
Route::get('product-details/{id}/delete', [App\Http\Controllers\ProductDetailsController::class, 'delete'])->name('product.details.delete');
