<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Type;
use Spatie\QueryBuilder\AllowedInclude;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

use Spatie\QueryBuilder\Includes\IncludeInterface;
use Illuminate\Database\Eloquent\Builder;

class AggregateInclude implements IncludeInterface
{
    protected string $column;

    protected string $function;

    public function __construct(string $column, string $function)
    {
        $this->column = $column;

        $this->function = $function;
    }

    public function __invoke(Builder $query, string $relations)
    {
        $query->withAggregate($relations, $this->column, $this->function);
    }
}

class TopByRating implements \Spatie\QueryBuilder\Sorts\Sort
{
    public function __invoke(Builder $query, bool $descending, string $property)
    {
        $direction = $descending ? 'DESC' : 'ASC';
        $query->orderByRaw("(`{$property}`) {$direction}");
    }
}
class TopFiveProducts implements \Spatie\QueryBuilder\Sorts\Sort
{
    public function __invoke(Builder $query, bool $descending, string $property)
    {
        $direction = $descending ? 'DESC' : 'ASC';
        $query->orderByRaw("(`{$property}`) {$direction}")
        ->limit(2);
    }
}

class FilterController extends Controller
{
    public function sort() {
        return QueryBuilder::for(Product::class)
            ->allowedIncludes([
                'category',
                'top_selling',
                AllowedInclude::custom('rating', new AggregateInclude('rating', 'avg'), 'ratings'),
                ])
            ->allowedSorts([
                'products.price',
                'top_selling_count',
                AllowedSort::custom('rating', new TopByRating(), 'ratings_avg_rating'),
                AllowedSort::custom('top_five_products', new TopFiveProducts(), 'top_selling_count'),
            ])
            ->get();
    }
}
