<?php

namespace App\Http\Controllers;

use App\Exceptions\CreateOrderException;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Resources\JustBoolResource;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
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
     * @throws CreateOrderException
     */
    public function store(CreateOrderRequest $request): AnonymousResourceCollection | JsonResponse
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
