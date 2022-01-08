<?php

//namespace App\Http\Controllers;

use App\Models\Category;
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
Route::apiResources([
    'images'=> \App\Http\Controllers\Api\V1\ImageController::class,
    'contacts' => \App\Http\Controllers\Api\V1\Dashboard\ContactController::class,
    'products'=> \App\Http\Controllers\Api\V1\ProductController::class,
    'categories'=> \App\Http\Controllers\Api\V1\CategoryController::class
]);

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::apiResources([
    'cart'=>\App\Http\Controllers\Api\V1\CartController::class,
     'ordes_user'=>\App\Http\Controllers\Api\V1\OrdesUserController::class,
    ]);
});


Route::post('/register',[\App\Http\Controllers\Api\V1\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\V1\AuthController::class, 'login']);
Route::post('/me', [\App\Http\Controllers\Api\V1\AuthController::class, 'me'])->middleware('auth:sanctum');

// Routes For Filter Controller
Route::get('/store', [\App\Http\Controllers\Api\v1\FilterController::class, 'show_all']);
Route::get('/store/top_selling', [\App\Http\Controllers\Api\v1\FilterController::class, 'topselling']);
Route::get('/store/filter', [\App\Http\Controllers\Api\v1\FilterController::class, 'filter']);
Route::get('/store/minmax', [\App\Http\Controllers\Api\v1\FilterController::class, 'minmax_price']);


Route::prefix('dashboard')->group(function () {

    Route::get('sort', [\App\Http\Controllers\Api\v1\dashboard\FilterProductController::class, 'sort']);

    Route::apiResources([
        'categories'=>\App\Http\Controllers\Api\V1\Dashboard\CategoryController::class,
        'products'=>\App\Http\Controllers\Api\V1\Dashboard\ProductController::class,
        'users'=>\App\Http\Controllers\Api\V1\Dashboard\UserController::class,
        'brands'=>\App\Http\Controllers\Api\V1\Dashboard\BrandController::class,
        'permissions'=>\App\Http\Controllers\Api\V1\Dashboard\PermissionController::class,
        'roles'=>\App\Http\Controllers\Api\V1\Dashboard\RoleController::class
    ]);
});


Route::post(
    '/product/{product}',
        [\App\Http\Controllers\Api\V1\RatingController::class, 'rateProduct']
)->middleware('auth:sanctum')->name('rateProduct');
