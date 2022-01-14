<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;


    public function UserOrderItems(){
        return $this->hasMany(UserOrdersItem::class,'user_orders_id');
    }
}
