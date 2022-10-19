<?php

// use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\CategoryController;

Route::get('/',[CategoryController::class,'index'])->name('home');
Route::get('/category/create', [CategoryController::class, 'create'])->name('create_category');

Route::post('/category/store', [CategoryController::class, 'store'])->name('category_store');
Route::get('category/delete/{category_id}', [CategoryController::class, 'delete'])->name('category_delete');

Route::get('/category/edit/{category_id}',[CategoryController::class,'edit'])->name('category_edit');
Route::post('/category/update/{category_id}',[CategoryController::class,'update'])->name('category_update');
