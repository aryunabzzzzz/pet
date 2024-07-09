<?php

namespace App\Services\Filters\Food;

use App\Services\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

class NameFilter implements FilterInterface
{
    public static function modify(Builder $query, array $params): Builder
    {
        if (empty($params['name'])) {
            return $query;
        }

        return $query->where('name', 'like', '%' . $params['name'] . '%');
    }
}
