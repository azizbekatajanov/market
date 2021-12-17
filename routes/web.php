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































Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('homepage');

//Route::view('/login', 'auth.login')->name('auth.login');
Route::view('/register', 'auth.register')->name('auth.register');
Route::get('/login', function (){
    return view('auth.login');
})->name('auth.login');

Route::get('/product/{id}',[\App\Http\Controllers\HomeController::class,'product'])->middleware('auth');
Route::get('/checkout',[\App\Http\Controllers\HomeController::class,'checkout']);
Route::get('/store',[\App\Http\Controllers\HomeController::class,'store']);
Route::get('/blank',[\App\Http\Controllers\HomeController::class,'blank']);


Route::get('/contact',[\App\Http\Controllers\HomeController::class,'contact']);
Route::get('/categories',[\App\Http\Controllers\HomeController::class,'categories']);


Route::prefix('dashboard')->group(function (){
    Route::view('/', 'dashboard.index')->name('dashboard.index');
    Route::view('/categories', 'dashboard.categories.index')->name('categories.index');
});
