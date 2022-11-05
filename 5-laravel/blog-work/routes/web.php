<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

//Frontend Routes
Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/post/{post_id}',[HomeController::class, 'post_detail'])->name('post_detail');
Route::get('/category/{category_id}',[HomeController::class, 'category_detail'])->name('category_detail');
Route::post('/post/search',[HomeController::class,'post_search'])->name('search_post');
//https: //laravel.com/docs/9.x/middleware
Route::middleware(['check_login_condition'])->group(function () {
    Route::get('/register',[HomeController::class, 'register'])->name('register');
    Route::post('/register/user',[HomeController::class, 'register_user'])->name('register_user');
    Route::get('/login', [HomeController::class, 'login'])->name('login');
    Route::post('/login/post', [HomeController::class, 'login_post'])->name('login_post');
});
Route::get('/logout',[HomeController::class, 'logout'])->name("logout");
//Admin routes

Route::get('/admin',[AdminController::class, 'index'])->name('admin_index');

Route::middleware(['auth'])->group(function(){
    Route::get('/admin',[AdminController::class, 'index'])->name('admin_index');
    Route::get('/admin/categories',[CategoryController::class, 'index'])->name('category_index');
    Route::post('/admin/categories/store',[CategoryController::class, 'store'])->name('category_store');

});


