<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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
Route ::get('/',[HomeController::class, 'index'])->name('welcome');



//ADmin side

Route::group(['prefix' =>'admin'], function() {

    Route::get('/',[AdminController::class, 'index'])->name('admin_index');





    Route::group(['prefix' =>'Profile'], function() {

        Route::get('/',[ProfileController::class, 'index'])->name('profile_index');
        Route::delete('/delete/{id}',[ProfileController::class,'delete'])->name('profile_delete');
        Route::get('/create',[ProfileController::class, 'create'])->name('profile_create');
        Route::post('/store',[ProfileController::class, 'store'])->name('profile_store');
        Route::get('/edit/{id}',[ProfileController::class,'edit'])->name('profile_edit');
        Route::put('/update/{id}',[ProfileController::class,'update'])->name('profile_update');

//profile prefix
});





//     Route::group(['prefix' =>'Services'], function() {

//         Route::get('/',[ProfileController::class, 'index'])->name('profiles');

// //profile prefix
// });





//   Route::group(['prefix' =>'profile'], function() {

//     Route::get('/',[ProfileController::class, 'index'])->name('profiles');

// //profile prefix
// });








//admin side perfix
});