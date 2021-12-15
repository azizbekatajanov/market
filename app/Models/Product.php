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
        return $this->hasMany(Image::class)->select('id','name','product_id');
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
    protected $appends = ['availability'];
    public function getAvailabilityAttribute() {
        if($this->quantity > 0) return 1;
        else return 0;
    }
    public function brand(){
        return $this->belongsTo(Brand::class)->select('id','name');
    }
}
