<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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

Route::group(['middilware'=>['auth'], 'prefix' =>'admin'], function() {

    // admin dashboard
    Route::get('/',[AdminController::class, 'index'])->name('admin_index');

    //admin categories
    Route::get('categories',[CategoryController::class, 'index'])->name('category_index');
    Route::post('categories/store',[CategoryController::class, 'store'])->name('category_store');
    Route::delete('categories/delete/{category_id}',[CategoryController::class, 'category_delete'])->name('category_delete');
    Route::get('category/edit/{category_id}',[CategoryController::class , 'category_edit'])->name('category_edit');
    Route::put('category/update/{category_id}',[CategoryController::class, 'category_update'])->name('category_update');
// admin posts
    Route::get('posts',[PostController::class, 'index'])->name('post_index');
    Route::delete('posts/delete/{post_id}',[PostController::class, 'delete'])->name('post_delete');
    Route::get('posts/create',[PostController::class, 'create'])->name('post_create');
    Route::post('posts/store',[PostController::class, 'store'])->name('post_store');
    Route::get('/posts/edit/{post_id}', [PostController::class, 'post_edit'])->name('post_edit');

    Route::put('posts/update/{post_id}',[PostController::class, 'post_update'])->name('post_update');
});


