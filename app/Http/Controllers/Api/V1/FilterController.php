<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use phpDocumentor\Reflection\Type;

class FilterController extends Controller
{
    // SHOW ALL
    public function show_all() {
        return Product::all();
    }

    public function filter(Request $request)
    {
        $query = Product::where('products.name', 'like', "$request->product%");

        // CATEGORY
        if (isset($request->category)) {
            $query
                ->join('categories', 'products.category_id', '=', 'categories.id')->where(function ($q) use ($request) {
                    $q->whereIn('categories.id', explode(',', $request->category));
                });
        }

        // PRICE
        if (isset($request->minprice) && isset($request->maxprice)) {
            $query->whereBetween('price', [$request->minprice, $request->maxprice]);
        }

        // BRAND
        if (isset($request->brand)) {
            $query->join('brand', 'products.brand_id', '=', 'brand.id')->where(function ($q) use ($request) {
                $q->whereIn('brand.id', explode(',', $request->brand));
            });
        }
        return $query->get();
    }
    public function topselling() {
    // TOP SELLING
    $top_selling = DB::table('users')
        ->select(DB::raw('select name, SUM(Amount) from test'))
        ->groupBy(name)
        ->orderByDesc(SUM(Amount))
        ->limit(3)
        ->get();
    return $top_selling;
    }
    public function minmax_price() {
        $minprice = DB::table('products')->min('price')->get();
        $maxprice =  DB::table('products')->max('price')->get();
        $minmax = DB::table('products')->whereIn('price', [$minprice, $maxprice])->get();
        return $minmax;
    }
}
