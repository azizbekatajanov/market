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
    // WAITING FOR FRONTEND TO BE DONE, TO REWRITE CODE APPROPRIATELY
//
//    public function filter() {
//        return QueryBuilder::for(Product::class)
//            ->allowedFilters();
//    }

    // SHOW ALL
    public function show_all(Request $request) {
        return DB::select("CALL GetUserById(2)");
//        if(isset($request->limit)) return DB::table('products')->paginate($request->limit);
//        else return DB::table('products')->paginate(30);
    }

    public function filter(Request $request)
    {
        $query = Product::where('products.name', 'like', "$request->product%");

        // CATEGORY
        if (isset($request->category)) {
            $query
                ->join('categories', 'products.category_id', '=', 'categories.id')->where(function ($q) use ($request) {
                    $q->whereIn('categories.name', explode(',', $request->category));
                });
        }

        // PRICE
        if (isset($request->minprice)) {
            $query->where('price', '>', $request->minprice);
        }
        if(isset($request->maxprice)) {
            $query->where('price', '<', $request->maxprice);
        }

        // BRAND
        if (isset($request->brand)) {
            $query->join('brands', 'products.brand_id', '=', 'brands.id')->where(function ($q) use ($request) {
                $q->whereIn('brands.name', explode(',', $request->brand));
            });
        }
        return $query->paginate(20);
    }
    public function topselling() {

    // TOP SELLING
    $top_selling = User::
        select(DB::raw('select name, SUM(Amount) from test'))
        ->groupBy(name)
        ->orderByDesc(SUM(Amount))
        ->limit(3)
        ->get();
    return $top_selling;
    }

    // MIN-MAX PRICE
    public function minmax_price() {
////        return DB::SELECT("CALL MinMaxPrice");
//        return Product::
//
//            ->get();
    }
}
