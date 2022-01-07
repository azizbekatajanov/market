<?php

namespace App\Http\Controllers;

use App\Http\Requests\RatingRequest;
use App\Http\Resources\RatingResource;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Http\Request;


class RatingController extends Controller
{
    public function rateProduct(Product $product, RatingRequest $request)
    {
        $user = Auth::user();
        if (isset($request->rating) || isset($request->comment)) {
            $validated_data = $request->validated();

            if (isset($validated_data['comment'])) {
                $product->rateProduct($user, $validated_data['rating'], $validated_data['comment']);
            }
            else {
                $product->rateProduct($user, $validated_data['rating']);
            }
        }
        else {
            return ["error_msg" => "Выберите оценку/рейтинг!"];
        }
        return new RatingResource($product);
    }
}
