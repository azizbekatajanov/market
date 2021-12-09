<?php

namespace App\Http\Controllers\Api\V1\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return
     */
    public function index()
    {
        $product = Product::all();
        return $product;
//        $ProductAll= Product::with('image')->paginate(12);
//        return $ProductAll;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'old_price'=>$request->old_price,
            'count'=>$request->count,
            'category_id'=>$request->category_id
        ]);

        if ($request->hasFile('image')){

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ProductOne = Product::with('image')->find($id);
        return $ProductOne;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product=Product::findOrFail($id);
        $product->name=$request->name;
        $product->price=$request->price;
        $product->old_price=$request->old_price;
        $product->availability=$request->availability;
        $product->count=$request->count;
        $product->category_id=$request->category_id;
        $product->save();
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return "Successfully deleted";
    }
}
