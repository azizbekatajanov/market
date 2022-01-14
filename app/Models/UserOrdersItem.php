<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrdersItem extends Model
{
    use HasFactory;

    public function productName(){
        return $this->hasOne(Product::class,'id','product_id');
    }



}
