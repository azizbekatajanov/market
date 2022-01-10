<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Database\Seeders\PermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        User::factory(50)->create();
        Category::factory(30)->create();
        Brand::factory(30)->create();
//        Product::factory(1000)->create();
        Color::factory(20)->create();
    }
}
