<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Type;
use Spatie\QueryBuilder\QueryBuilder;

class FilterController extends Controller
{

    public function sort() {
        return QueryBuilder::for(Product::class)
            ->join('user_orders_lists', 'user_orders_lists.product_id', '=', 'products.id')
//            ->join('user_orders_lists', function ($join) {
//                $join->on('user_orders_lists.product_id', '=', 'products.id');//->orOn(...);
//            })
            ->allowedIncludes(['category', 'topselling'])
            ->allowedSorts(['products.price', 'topselling_count'])
            ->get();
//        ->toSql();
    }
}
