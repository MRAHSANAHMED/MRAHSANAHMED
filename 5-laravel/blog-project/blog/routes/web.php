<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//blog web site routes
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/post/{post_id}',[HomeController::class, 'post_detail'])->name('post_detail');

//admin panel routes
Route::get('/admin', [AdminController::class, 'index'])->name('admin_index');
