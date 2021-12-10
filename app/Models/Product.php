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

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    use HasFactory;
    public function image(){
        return $this->hasMany(Image::class)->select('name','product_id');
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
