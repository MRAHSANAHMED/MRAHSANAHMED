<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

    Route::get('/post_like/{post_id}',[HomeController::class,'post_like'])->name('post_like');
    Route::get('/post_unlike/{post_id}',[HomeController::class,'post_unlike'])->name('post_unlike');

    // admin dashboard
    Route::get('/',[AdminController::class, 'index'])->name('admin_index');

    //admin categories
    Route::group(['prefix' =>'categories'], function() {
    Route::get('/',[CategoryController::class, 'index'])->name('category_index');
    Route::post('/store',[CategoryController::class, 'store'])->name('category_store');
    Route::delete('/delete/{category_id}',[CategoryController::class, 'category_delete'])->name('category_delete');
    Route::get('/edit/{category_id}',[CategoryController::class , 'category_edit'])->name('category_edit');
    Route::put('/update/{category_id}',[CategoryController::class, 'category_update'])->name('category_update');
    });
// admin posts
Route::group(['prefix' =>'posts'], function() {
    Route::get('/',[PostController::class, 'index'])->name('post_index');
    Route::delete('/delete/{post_id}',[PostController::class, 'delete'])->name('post_delete');
    Route::get('/create',[PostController::class, 'create'])->name('post_create');
    Route::post('/store',[PostController::class, 'store'])->name('post_store');
    Route::get('/edit/{post_id}', [PostController::class, 'post_edit'])->name('post_edit');
    Route::put('/update/{post_id}',[PostController::class, 'post_update'])->name('post_update');
});

// users
Route::group(['prefix' =>'users'], function() {

    Route::get('/',[UserController::class, 'index'])->name('user_index');
    Route::delete('/delete/{user_id}',[UserController::class, 'delete'])->name('user_delete');
    Route::get('/create',[UserController::class, 'user_create'])->name('user_create');
    Route::post('/store',[UserController::class, 'user_store'])->name('user_store');
    Route::get('/edit/{user_id}', [UserController::class, 'edit'])->name('user_edit');
    Route::put('/update/{user_id}',[UserController::class, 'update'])->name('user_update');
});
// admin comments route
Route::group(['prefix' =>'comments'], function() {

 Route::get('/',[CommentController::class, 'index'])->name('comment_index');
 Route::post('/approve/{comment_id}',[CommentController::class, 'comment_approve'])->name('comment_approve');
 Route::post('/unapprove/{comment_id}',[CommentController::class, 'comment_unapprove'])->name('comment_unapprove');
 Route::delete('/delete/{comment_id}',[CommentController::class, 'comment_delete'])->name('comment_delete');
 Route::post('/store/post/{comment_post_id}',[CommentController::class, 'comment_store'])->name('comment_store');

});




// closing middileware
}); 


