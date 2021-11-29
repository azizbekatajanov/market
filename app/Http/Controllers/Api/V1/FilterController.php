<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Type;
class FilterController extends Controller
{

    // SHOW ALL
    public function show_all(Request $request) {
        if(isset($request->pagination))
            return DB::table('products')->paginate(50);
        else
            return DB::table('products')->paginate(20);
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

    // MIN-MAX PRICE
    public function minmax_price() {
        $minprice = DB::table('products')->min('price');
        $maxprice =  DB::table('products')->max('price');
        $minmax = DB::table('products')->whereIn('price', [$minprice, $maxprice])->get();
        return $minmax;
    }
}
