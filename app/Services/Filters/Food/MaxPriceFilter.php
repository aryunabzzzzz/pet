<?php

namespace App\Services\Filters\Food;

use App\Services\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

class MaxPriceFilter implements FilterInterface
{
    public static function modify(Builder $query, array $params): Builder
    {
        if (empty($params['maxPrice'])) {
            return $query;
        }

        return $query->where('price', '<=', $params['maxPrice']);
    }
}
