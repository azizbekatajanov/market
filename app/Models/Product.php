<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Class Product
 * @package App
 * @mixin Builder
 */
class Product extends Model
{
    use HasFactory;
    public function image(){
        return $this->hasMany(Image::class);
    }
}
