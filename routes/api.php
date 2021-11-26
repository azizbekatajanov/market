<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route For Filter Controller
Route::get('/store', [\App\Http\Controllers\Api\v1\FilterController::class, 'filter']);

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::apiResources([
    'image'=>\App\Http\Controllers\Api\V1\ImageController::class,
    'product'=>\App\Http\Controllers\Api\V1\ProductController::class,
//    'store' => App\Http\Controllers\Api\V1\FilterController::class,
]);

Route::post('/register',[\App\Http\Controllers\Api\V1\AuthController::class, 'register']);
Route::post('login', [\App\Http\Controllers\Api\V1\AuthController::class, 'login']);
Route::post('/me', [\App\Http\Controllers\Api\V1\AuthController::class, 'me'])->middleware('auth:sanctum');
Route::prefix('dashboard')->group(function (){
//    Route::apiResource('categories', \App\Http\Controllers\Api\V1\Dashboard\CategoryController::class);
    Route::resources([
        'categories'=>\App\Http\Controllers\Api\V1\Dashboard\CategoryController::class
    ]);
});
