<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetFoodRequest;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Resources\FoodResource;
use App\Models\Food;
use App\Services\FoodService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FoodController extends Controller
{
    public function __construct(public FoodService  $foodService)
    {
    }

    /**
     * @return AnonymousResourceCollection
     *
     * Показывает все продукты(есть фильтрация)
     */
    public function index(GetFoodRequest $request): AnonymousResourceCollection
    {
        $foods = $this->foodService->index($request->getFoodDTO());
        return FoodResource::collection($foods);
    }

    /**
     * @param int $id
     * @return AnonymousResourceCollection
     *
     * Показывает один продукт
     */
    public function show(int $id): AnonymousResourceCollection
    {
        $food = $this->foodService->show($id);
        return FoodResource::collection($food);
    }

    /**
     * @param StoreFoodRequest $request
     * @return FoodResource
     *
     * Создает новый продукт
     */
    public function store(StoreFoodRequest $request): FoodResource
    {
        $food = $this->foodService->store($request->storeFoodDTO());
        return new FoodResource($food);
    }

    /**
     * @param StoreFoodRequest $request
     * @param int $id
     * @return int
     *
     * Редактирует объект
     */
    public function update(StoreFoodRequest $request, int $id): int
    {
        return $this->foodService->update($request->storeFoodDTO(), $id);

    }

    /**
     * @param int $id
     * @return int
     *
     * Удаляет объект
     */
    public function destroy(int $id): int
    {
        return $this->foodService->destroy($id);
    }
}
