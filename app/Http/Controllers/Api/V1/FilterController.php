<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class FilterController extends Controller
{
    public function Show(Request $request) {
        $query = Product::where('products.name', $request->product);
        if($request->action == 'search') {
            if(isset($request->category)) {
                $query
                ->join('categories', 'products.category_id', '=', 'categories.id')->where(function ($q) use ($request) {
                    $q->where([
                        ['categories.name', $request->category],
                        [],
                    ]);
                });
            }
            if(isset($request->minprice) && isset($request->maxprice)) {
                $query->whereBetween('price', [$request->minprice, $request->maxprice]);
            }
            if(isset($request->brand)) {
                $query->join('brand', 'products.brand_id', '=', 'brand.id')->where(function ($q) use ($request) {
                    $q->where('brand', $request->brand);
                });
            }
        return $query->get();
        }
        return 'not working';
//        $top_selling = DB::table('users')
//            ->select(DB::raw('select name, SUM(Amount) from test'))
//            ->groupBy(name)
//            ->orderByDesc(SUM(Amount))
//            ->limit(3)
//            ->get();
    }
}
