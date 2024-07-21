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
use Illuminate\Support\Facades\Cache;

class FoodService
{
    /**
     * @param GetFoodDTO $DTO
     * @return Collection
     */
    public function index(GetFoodDTO $DTO): Collection
    {
        $query = Food::query()->with('image');
        return $this->getQuery($query, $DTO->toArray())->get();
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        $key = 'foods_list';
        $ttl = 600;

        $foods = Cache::get($key);
        if ($foods == null) {
            $foods = Cache::remember($key, $ttl, function () {
                return Food::all();
            });
        }
        return $foods;
    }

    /**
     * @param int $id
     * @return Collection
     */
    public function show(int $id): Collection
    {
        return Food::with('image')->where('id',$id)->get();
    }

    /**
     * @param StoreFoodDTO $DTO
     * @return Food
     */
    public function store(StoreFoodDTO $DTO): Food
    {
        return Food::create($DTO->toArray());
    }

    /**
     * @param StoreFoodDTO $DTO
     * @param int $id
     * @return bool
     */
    public function update(StoreFoodDTO $DTO, int $id): bool
    {
        Food::where('id', $id)->update($DTO->toArray());
        return true;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool
    {
        $food = Food::find($id);
        $food->image()->delete();
        $food->delete();
        return true;
    }

    /**
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    private function getQuery(Builder $query, array $params): Builder
    {
        $query = CategoryIdFilter::modify($query, $params);
        $query = PriceFilter::modify($query, $params);
        $query = MinPriceFilter::modify($query, $params);
        $query = MinPriceFilter::modify($query, $params);
        return NameFilter::modify($query, $params);
    }
}
