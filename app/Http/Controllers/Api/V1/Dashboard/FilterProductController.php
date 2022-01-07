<?php

namespace App\Http\Controllers\Api\v1\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedInclude;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\Sorts\Sort;

class FilterProductController extends Controller
{
    public function sort() {
        $products = QueryBuilder::for(Product::class)
            ->join('categories', 'categories.id', '=', 'category_id')
            ->join('brands', 'brands.id', '=', 'brand_id')
            ->select('products.*', 'categories.id as category_id', 'categories.name as category_name', 'brands.id as brand_id', 'brands.name as brand_name')
            ->allowedIncludes(['category', 'brand'])
            ->allowedSorts(['price', 'products.name', 'brands.name', 'categories.name'])
            ->get();
         return $products;
    }
}
