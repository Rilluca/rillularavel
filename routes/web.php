<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/addCategory', function () {
    return view('addCategory');
});

Route::post('/addCategory/store',[App\Http\Controllers\CategoryController::class, 'add'])->name('addCategory');

Route::get('/showCategory',[App\Http\Controllers\CategoryController::class, 'view'])->name('showCategory');

Route::get('/addProduct', function () {
    return view('addProduct',['categoryID'=>App\Category::all()]);
});

Route::post('/addProduct/store',[App\Http\Controllers\ProductController::class, 'add'])->name('addProduct');

Route::get('/showProduct',[App\Http\Controllers\ProductController::class, 'view'])->name('showProduct');

Route::get('/deleteProduct/{id}',[App\Http\Controllers\ProductController::class,'delete'])->name('deleteProduct');

Route::get('/editProduct/{id}',[App\Http\Controllers\ProductController::class,'edit'])->name('editProduct');

Route::post('/updateProduct',[App\Http\Controllers\ProductController::class,'update'])->name('updateProduct');

Route::get('/productDetail/{id}',[App\Http\Controllers\ProductController::class,'productDetail'])->name('product.detail');

Route::post('/addCart',[App\Http\Controllers\CartController::class,'add'])->name('add.to.cart');

Route::get('/myCart',[App\Http\Controllers\CartController::class,'showMyCart'])->name('show.my.cart');

Route::get('/deleteCart/{id}',[App\Http\Controllers\CartController::class,'delete'])->name('delete.cart.item');

Route::post('/checkout', [App\Http\Controllers\PaymentController::class, 'paymentPost'])->name('payment.post');

Route::get('/myOrder', [App\Http\Controllers\PaymentController::class, 'view'])->name('myOrder');

Route::post('/viewProduct', [App\Http\Controllers\ProductController::class, 'view'])->name('viewProduct');

Route::post('/viewProduct', [App\Http\Controllers\ProductController::class, 'searchProduct'])->name('search.product');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/contact',[App\Http\Controllers\ContactController::class, 'view'])->name('viewContact');