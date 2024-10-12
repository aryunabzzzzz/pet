<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Resources\JustBoolResource;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderController extends Controller
{
    /**
     * @param OrderService $orderService
     */
    public function __construct(public OrderService $orderService)
    {
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $orders = $this->orderService->getAll();
        return OrderResource::collection($orders);
    }

    /**
     * @param int $id
     * @return AnonymousResourceCollection
     */
    public function show(int $id): AnonymousResourceCollection
    {
        $order = $this->orderService->getById($id);
        return OrderResource::collection($order);
    }

    /**
     * @param CreateOrderRequest $request
     * @return AnonymousResourceCollection|JsonResponse
     */
    public function store(CreateOrderRequest $request): AnonymousResourceCollection|JsonResponse
    {
        $order = $this->orderService->create($request->createOrderDTO());
        return OrderResource::collection($order);
    }

    /**
     * @param int $id
     * @return JustBoolResource
     */
    public function destroy(int $id): JustBoolResource
    {
        $result = $this->orderService->delete($id);
        return new JustBoolResource($result);
    }
}
