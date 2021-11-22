<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

<<<<<<< HEAD
    public function product(){
        return $this->hasMany(Product::class);
    }
=======

    public function product(){
        return $this->hasMany(Product::class);
    }

>>>>>>> 1f220bc44a85f98dccc9bbe3c8e592797ff6102d
}
