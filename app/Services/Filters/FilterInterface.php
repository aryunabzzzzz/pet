<?php

namespace App\Services\Filters;

use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
    /**
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public static function modify(Builder $query, array $params): Builder;
}
