<?php

namespace App\Services\Filters\Food;

use App\Services\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

class PriceFilter implements FilterInterface
{
    /**
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public static function modify(Builder $query, array $params): Builder
    {
        if (empty($params['price'])) {
            return $query;
        }

        return $query->where('price', $params['price']);
    }
}
