<?php

namespace App\Services;

use App\Data\DTO\Food\GetFoodDTO;
use App\Data\DTO\Food\StoreFoodDTO;
use App\Models\Food;
use App\Services\Filters\Food\CategoryIdFilter;
use App\Services\Filters\Food\MinPriceFilter;
use App\Services\Filters\Food\NameFilter;
use App\Services\Filters\Food\PriceFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class FoodService
{
    public function index(GetFoodDTO $DTO): Collection
    {
        $query = Food::query()->with('image');
        return $this->getQuery($query, $DTO->toArray())->get();
    }

    public function show(int $id): Collection
    {
        return Food::with('image')->where('id',$id)->get();
    }

    public function store(StoreFoodDTO $DTO): Food
    {
        return Food::create($DTO->toArray());
    }

    public function update(StoreFoodDTO $DTO, int $id): int
    {
        return Food::where('id', $id)->update($DTO->toArray());
    }

    public function destroy(int $id): int
    {
        return Food::destroy($id);
    }

    private function getQuery(Builder $query, array $params): Builder
    {
        $query = CategoryIdFilter::modify($query, $params);
        $query = PriceFilter::modify($query, $params);
        $query = MinPriceFilter::modify($query, $params);
        $query = MinPriceFilter::modify($query, $params);
        return NameFilter::modify($query, $params);
    }

}
