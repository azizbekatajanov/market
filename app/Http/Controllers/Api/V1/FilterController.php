<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Type;
use Spatie\QueryBuilder\AllowedInclude;
use Spatie\QueryBuilder\QueryBuilder;

use Spatie\QueryBuilder\Includes\IncludeInterface;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Post;

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

class FilterController extends Controller
{
    public function sort() {
        return QueryBuilder::for(Product::class)
            ->allowedIncludes(['category', 'topselling', AllowedInclude::custom('rating', new AggregateInclude('rating', 'avg'), 'ratings')])
            ->allowedSorts(['products.price', 'topselling_count'])
            ->get();
    }
}
