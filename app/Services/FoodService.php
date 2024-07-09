<?php

namespace App\Services;

use App\Data\DTO\Food\StoreFoodDTO;
use App\Models\Food;
use Illuminate\Database\Eloquent\Collection;

class FoodService
{
    public function index(): Collection
    {
        return Food::with('image')->get();
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

}
