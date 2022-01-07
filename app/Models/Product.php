<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\EloquentSortable\Sortable;
use InvalidArgumentException;


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


    /**************************************(Nurlan)***********************************************
     * One-to-Many Relationship Product-Rating. Get all ratings for the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    /**
     * Rate the product.
     *
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     * @param int $rating
     * @param string|null $comment
     * @return Model
     */
    public function rateProduct($user, $rating, $comment = null)
    {
        // $this = Product
        return $this->ratings()->updateOrCreate(
            ['user_id' => $user->id, 'product_id' => $this->id],
            ['rating' => $rating, 'comment' => $comment]
        );
    }

    /**
     * Fetch the average rating for the task.
     *
     * @return float
     */
    public function rating()
    {
        return round($this->ratings->avg('rating'), 1);
    }

}
