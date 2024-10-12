<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoodRequest;
use App\Http\Resources\FoodResource;
use App\Http\Resources\JustBoolResource;
use App\Services\FoodService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FoodController extends Controller
{
    /**
     * @param FoodService $foodService
     */
    public function __construct(public FoodService  $foodService)
    {
    }

//    /**
//     * @return AnonymousResourceCollection
//     *
//     * Показывает все продукты(есть фильтрация)
//     */
//    public function index(GetFoodRequest $request): AnonymousResourceCollection
//    {
//        $foods = $this->foodService->index($request->getFoodDTO());
//        return FoodResource::collection($foods);
//    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $foods = $this->foodService->getAll();
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
     * @return JustBoolResource
     *
     * Редактирует объект
     */
    public function update(StoreFoodRequest $request, int $id): JustBoolResource
    {
        $result = $this->foodService->update($request->storeFoodDTO(), $id);
        return new JustBoolResource($result);
    }

    /**
     * @param int $id
     * @return JustBoolResource
     *
     * Удаляет объект
     */
    public function destroy(int $id): JustBoolResource
    {
        $result = $this->foodService->destroy($id);
        return new JustBoolResource($result);
    }
}
