<?php

namespace App\Http\Controllers\Api\V1\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\Dashboard\ProductResource;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */

    public function index(Request $request)
    {
        if(isset($request->limit)){
            $products = Product::with('brand', 'category', 'image')->paginate($request->limit);
        }
        else{
            $products = Product::with('brand', 'category', 'image')->get();
        }

        return ProductResource::collection($products);
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
            'description'=>$request->description,
            'price'=>$request->price,
            'old_price'=>$request->old_price,
            'quantity'=>$request->quantity,
            'category_id'=>$request->category_id,
            'brand_id'=>$request->brand_id
        ]);
        if($request->hasFile('images')) {
            foreach ($request->images as $image) {
                Image::create([
                    $name = Storage::disk('product_images')->putFile("$product->id", $image),
                    'name' => basename($name),
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
     * @return Product|\Illuminate\Http\JsonResponse|int
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        $old_images = Image::where('product_id', $product->id)->get();
        $new_images = $request->images;

        foreach ($old_images as $old_image) {
            foreach ($new_images as $image) {
                if ($old_image->id == $image->id) {
                    Storage::disk('product_images')->delete($old_image->name);
                    $name = Storage::disk('product_images')->putFile($product->id, $image);
                    $old_image->name = basename($name);
                    $old_image->update();
                }
            }
        }
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
        Storage::disk('product_images')->deleteDirectory($id);
        return response()->json([
            'message'=> 'Successfully deleted'
        ]);
    }
}
