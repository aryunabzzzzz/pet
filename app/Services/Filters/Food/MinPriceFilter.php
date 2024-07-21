<?php

namespace App\Services\Filters\Food;

use App\Services\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

class MinPriceFilter implements FilterInterface
{
    /**
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public static function modify(Builder $query, array $params): Builder
    {
        if (empty($params['minPrice'])) {
            return $query;
        }

        return $query->where('price', '>=', $params['minPrice']);
    }
}
