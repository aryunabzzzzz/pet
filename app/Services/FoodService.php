<?php

namespace App\Services;

use App\Data\DTO\Food\StoreFoodDTO;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Resources\FoodResource;
use App\Http\Resources\ImageResource;
use App\Models\Food;
use App\Models\Image;
use Illuminate\Database\Eloquent\Collection;

class FoodService
{
    public function index(): Collection
    {
        return Food::all();
    }

    public function show(int $id): Food
    {
        return Food::find($id);
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

    public function getImage(int $id): Image|null
    {
        return Food::find($id)->image;
    }

}
