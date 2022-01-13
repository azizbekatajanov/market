<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->limit)) {
             $products = Product::with('image')->limit($request->limit)->get();
        }
        else $products = Product::with('image')->limit(10)->get();

        $object = new \stdClass();
        $object->products = $products;
        $object->max_price = Product::max('price');

        return $object;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $product = new Product();
//        $product->name=$request->name;
//        $product->price=$request->price;
//        $product->old_price=$request->old_price;
//        $product->availability=$request->availability;
//        $product->count=$request->count;
//        $product->category_id=$request->category_id;
//        $product->save();
//        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::with('image')->find($id);
    }

}
