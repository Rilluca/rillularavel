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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/contact',[App\Http\Controllers\ContactController::class, 'view'])->name('viewContact');