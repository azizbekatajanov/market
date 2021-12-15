<?php

namespace App\Http\Controllers\Api\V1\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function index()
    {
        $products = Product::with('image')->get();

        return $products;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'old_price'=>$request->old_price,
            'quantity'=>$request->quantity,
            'category_id'=>$request->category_id,
            'brand_id'=>$request->brand_id,
        ]);

            for($i = 1; $i <= 4; $i++) {
                if ($request->hasFile('image' . $i)) {
                    $image = 'image'.$i;
                    Image::create([
                        'name'=> $request->file("image".$i)->store('product_images/'.$product->id),
                        'product_id' => $product->id
                    ]);
                }
            }
        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('image')->find($id);
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ProductRequest $request, Product $product)
    {
        for($i = 1; $i <= 4; $i++) {
            if ($request->hasFile('image' . $i)) {
                $image = 'image'.$i;
                Image::create([
                    'name'=> $request->file("image".$i)->store('product_images/'.$product->id),
                    'product_id' => $product->id
                ]);
            }
        }
        $product->update($request->validated());

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return response()->json([
            'message'=> 'Successfully deleted'
        ]);
    }
}
