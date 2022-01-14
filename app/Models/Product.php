<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\EloquentSortable\Sortable;

/**
 * Class Product
 * @package App
 * @mixin Builder
 */
class Product extends Model
{
    use HasFactory;//, SortableTrait;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function scopeQuantity($query) {
        return $query->whereNotNull('quantity');
    }

    public function brand(){
        return $this->belongsTo(Brand::class)->select('id','name');
    }

    public function category() {
        return $this->belongsTo(Category::class)->select('id', 'name');
    }
    public function categoryName() {
        return $this->belongsTo(Category::class)->select('id', 'name');
    }
    public function image(){
        return $this->hasMany(Image::class)->select('id','name','product_id');
    }


    protected $appends = ['availability'];
    public function getAvailabilityAttribute() {
        if($this->quantity > 0) return 1;
        else return 0;
    }
}
