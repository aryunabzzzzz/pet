<?php

namespace App\Services\Filters;

use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
    public static function modify(Builder $query, array $params): Builder;
}
