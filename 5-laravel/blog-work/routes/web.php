<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

//Frontend Routes
Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/post/{post_id}',[HomeController::class, 'post_detail'])->name('post_detail');
Route::get('/category/{category_id}',[HomeController::class, 'category_detail'])->name('category_detail');
Route::post('/post/search',[HomeController::class,'post_search'])->name('search_post');
Route::get('/register',[HomeController::class, 'register'])->name('register');
Route::post('/register/user',[HomeController::class, 'register_user'])->name('register_user');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login/post', [HomeController::class, 'login_post'])->name('login_post');


//Admin routes
Route::get('/admin',[AdminController::class, 'index'])->name('admin_index');
