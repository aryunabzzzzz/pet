<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoodRequest;
use App\Http\Resources\FoodResource;
use App\Http\Resources\ImageResource;
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
     * Показывает все продукты
     */
    public function index(): AnonymousResourceCollection
    {
        $foods = $this->foodService->index();
        return FoodResource::collection($foods);
    }

    /**
     * @param $id
     * @return FoodResource
     *
     * Показывает один продукт
     */
    public function show($id): FoodResource
    {
        $food = $this->foodService->show($id);
        return new FoodResource($food);
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
     * @param $id
     * @return int
     *
     * Удаляет объект
     */
    public function destroy($id): int
    {
        return $this->foodService->destroy($id);
    }

    public function getImg($id): ImageResource|null
    {
        $image = $this->foodService->getImage($id);
        return new ImageResource($image);
    }
}
