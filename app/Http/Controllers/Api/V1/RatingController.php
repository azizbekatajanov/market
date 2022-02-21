<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RatingRequest;
use App\Http\Resources\RatingResource;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function rateProduct(Product $product, RatingRequest $request)
    {
//        $user = Auth::user();
        $user = $request->user();
        if (isset($request->rating) || isset($request->comment)) {
            $validated_data = $request->validated();

            if (isset($validated_data['comment'])) {
                $product->setRating($user, $validated_data['rating'], $validated_data['comment']);
            }
            else {
                $product->setRating($user, $validated_data['rating']);
            }
        }
        else {
            return ["error_msg" => "Выберите оценку/рейтинг!"];
        }
        return new RatingResource($product);
    }
}
