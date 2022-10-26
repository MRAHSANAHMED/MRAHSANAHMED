<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

//Frontend Routes
Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/post/{post_id}',[HomeController::class, 'post_detail'])->name('post_detail');
Route::get('/category/{category_id}',[HomeController::class, 'category_detail'])->name('category_detail');
Route::post('/post/search',[HomeController::class,'post_search'])->name('search_post');
