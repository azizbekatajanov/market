<?php

namespace App\Http\Resources\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'price'=>$this->price,
            'old_price'=>$this->old_price,
            'quantity'=>$this->quantity,
//            'brand_id'=>$this->brand->id,
            'brand'=>$this->brand,
//            'category_id'=>$this->category->id,
            'category'=>$this->category,
            'image' => $this->image
        ];
    }
}
