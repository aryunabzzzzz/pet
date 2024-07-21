<?php

namespace App\Services\Filters\Food;

use App\Services\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

class CategoryIdFilter implements FilterInterface
{
    /**
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public static function modify(Builder $query, array $params): Builder
    {
        if (empty($params['categoryId'])) {
            return $query;
        }

        return $query->where('category_id', $params['categoryId']);
    }
}
