<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
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


Route::get('/product/{id}',[\App\Http\Controllers\HomeController::class,'product']);
Route::get('/checkout',[\App\Http\Controllers\HomeController::class,'checkout']);
Route::get('/store',[\App\Http\Controllers\HomeController::class,'store']);
Route::get('/blank',[\App\Http\Controllers\HomeController::class,'blank']);

Route::get('/contact',[\App\Http\Controllers\HomeController::class,'contact']);
Route::get('/categories',[\App\Http\Controllers\HomeController::class,'categories']);

Route::prefix('dashboard')->group(function (){
    Route::view('/', 'dashboard.index')->name('dashboard.index');
    Route::view('/categories', 'dashboard.categories.index')->name('categories.index');


//    Route::group([
//    'prefix' => '{locale?}',
//    'where' => ['locale' => '[a-z]{2}'],
//    'middleware' => 'set_locale'
//], function() {
//
//    Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('homepage');
//
//    //Route::view('/login', 'auth.login')->name('auth.login');
//    Route::view('/register', 'auth.register')->name('auth.register');
//    Route::get('/login', function (){
//        return view('auth.login');
//    })->name('auth.login');
//
//
//    Route::get('/product/'.request()->segment(3),[\App\Http\Controllers\HomeController::class,'product'])->name('product');
//
//    Route::get('/checkout',[\App\Http\Controllers\HomeController::class,'checkout'])->name('checkout');
//    Route::get('/store',[\App\Http\Controllers\HomeController::class,'store']);
//    Route::get('/blank',[\App\Http\Controllers\HomeController::class,'blank']);
//
//
//    Route::get('/contact',[\App\Http\Controllers\HomeController::class,'contact']);
//    Route::get('/categories',[\App\Http\Controllers\HomeController::class,'categories']);
//
//
//    Route::prefix('dashboard')->group(function (){
//        Route::view('/', 'dashboard.index')->name('dashboard.index');
//        Route::view('/categories', 'dashboard.categories.index')->name('categories.index');
//    });
//>>>>>>> 5f541605b371a129fc509adac8d9ba0c515f6f11
//});
//
//Route::get('/{some_route}', function ($some_route) {
//    return redirect(('/'.app()->getLocale().'/'.$some_route));
//});


