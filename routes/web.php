<?php

use App\Http\Controllers\Dashboard\CartController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
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

Route::get('/',[HomeController::class,'index']);
Route::get('/products',[ProductController::class,'index']);
Route::get('/categories',[CategoryController::class,'index']);
Route::get('/cart',[CartController::class,'index']);

Route::post('/',[ContactController::class,'insert'])->name('contact.insert');

Route::get('/admin', function () {
    return view('admin.index');
});
