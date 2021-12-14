<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function image(){
        return $this->hasMany(Image::class);
    }
    protected $appends = ['availability'];
    public function getAvailabilityAttribute() {
        if($this->quantity > 0) return 1;
        else return 0;
    }
}
