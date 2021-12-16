<?php

namespace App\Providers;

use App\Http\Resources\Dashboard\BrandResource;
use App\Http\Resources\Dashboard\CategoryResource;
use App\Http\Resources\Dashboard\ProductResource;
use App\Http\Resources\Dashboard\UserResource;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
        CategoryResource::withoutWrapping();
        ProductResource::withoutWrapping();
        BrandResource::withoutWrapping();
        UserResource::withoutWrapping();
    }
}
