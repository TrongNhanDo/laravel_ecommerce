<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Dashboard\CartController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\OrderController as DashboardOrderController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\UserController as DashboardUserController;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
//phía người dùng
Route::get('',[HomeController::class,'index'])->name('trangchu');
Route::get('products',[ProductController::class,'index'])->name('product_list');
Route::get('products/{id}',[ProductController::class,'detail'])->name('product_detail');
Route::get('test',[ProductController::class,'test']);
Route::get('search',[ProductController::class,'search'])->name('product_search');
Route::get('search_cate',[ProductController::class,'search_cate']);

Route::get('/contact',[ContactController::class,'insert'])->name('contact');

//Giỏ hàng
Route::get('cart',[CartController::class,'show']);
Route::get('cart_data',[CartController::class,'index']);
Route::post('cart',[CartController::class,'store'])->name('cart_store');
Route::put('cart/{id}',[CartController::class,'update'])->name('cart_update');
Route::delete('cart/{id}',[CartController::class,'delete'])->name('cart_delete');
Route::delete('cart',[CartController::class,'delete_all'])->name('cart_delete_all');

//Payment
Route::get('payment',[DashboardOrderController::class,'index'])->name('order');
Route::post('payment',[DashboardOrderController::class,'payment_off'])->name('payment');


//login & register
Route::get('/register',[DashboardUserController::class,'show_register'])->name('show_register');
Route::get('/profile/{id}',[DashboardUserController::class,'profile'])->name('show_profile');
Route::post('/register',[DashboardUserController::class,'register'])->name('register');
Route::get('/login',[DashboardUserController::class,'show_login'])->name('show_login');
Route::post('/login',[DashboardUserController::class,'login'])->name('user-login');
Route::get('/logout',[DashboardUserController::class,'logout'])->name('logout');

//contact & about
Route::post('/',[ContactController::class,'insert'])->name('contact.insert');
Route::get('about',function(){
    return view('dashboard.layout.about');
});

// =================================================================================================================
// =================================================================================================================
// =================================================================================================================

// user
Route::get('admin/login',[UserController::class,'showlogin'])->name('admin/login');
Route::post('admin/login',[UserController::class,'login'])->name('admin.login');

Route::group(['prefix'=> 'admin','middleware'=>'auth'],function(){
    Route::get('/', function (){
        return view('admin.index');
    });
    Route::get('/admin/logout',[UserController::class,'logout'])->name('admin.logout');
    // product
    Route::get('/product',[AdminProductController::class,'index'])->name('admin.product_list');
    Route::get('/product/detail/{id}',[AdminProductController::class,'detail']);
    Route::get('/product/listproduct',[AdminProductController::class,'getproduct']);
    Route::post('/product',[AdminProductController::class,'store'])->name('admin.product_store');
    Route::put('/product/{id}',[AdminProductController::class,'update'])->name('admin.product_update');
    Route::delete('/product/{id}',[AdminProductController::class,'destroy'])->name('admin.product_delete');

    // category
    Route::get('/category',[AdminCategoryController::class,'index'])->name('admin.category_list');
    Route::get('/category/listcategory',[AdminCategoryController::class,'getcategory'])->name('admin.category_insert');
    Route::post('/category',[AdminCategoryController::class,'store'])->name('admin.category_store');
    Route::get('/category/detail/{id}',[AdminCategoryController::class,'detail']);
    Route::put('/category/{id}',[AdminCategoryController::class,'update'])->name('admin.category_update');
    Route::delete('/category/{id}',[AdminCategoryController::class,'destroy'])->name('admin.category_delete');

    

    Route::get('/listuser',[UserController::class,'index'])->name('admin.user_list');
    Route::get('/insertuser',[UserController::class,'insert'])->name('admin.user_insert');
    Route::post('/insertuser',[UserController::class,'store'])->name('admin.user_store');
    Route::get('/edituser/{id}',[UserController::class,'edit'])->name('admin.user_edit');
    Route::post('/edituser/{id}',[UserController::class,'update'])->name('admin.user_update');

    //contact
    Route::get('/listcontact',[AdminContactController::class,'index'])->name('admin.contact_list');

    //Order
    Route::get('/listorder',[OrderController::class,'index'])->name('admin.order_list');
});