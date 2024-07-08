<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Resources\CartResource;
use App\Http\Resources\JustBoolResource;
use App\Services\CartService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CartController extends Controller
{
    public function __construct(public CartService $cartService)
    {
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $carts = $this->cartService->getAll();
        return CartResource::collection($carts);
    }

    /**
     * @param int $customerId
     * @return AnonymousResourceCollection
     */
    public function show(int $customerId)
    {
        $cart = $this->cartService->getByUserId($customerId);
        return CartResource::collection($cart);
    }

    /**
     * @param StoreCartRequest $request
     * @return CartResource
     */
     public function store(StoreCartRequest $request): CartResource
     {
         $cart = $this->cartService->create($request->getCustomerId());
         return new CartResource($cart);
     }

    /**
     * @param UpdateCartRequest $request
     * @param int $customerId
     * @return JustBoolResource
     */
     public function update(UpdateCartRequest $request, int $customerId): JustBoolResource
     {
         $result = $this->cartService->addFood($request->getFoodId(), $request->getQuantity(), $customerId);
         return new JustBoolResource($result);
     }

    /**
     * @param int $customerId
     * @return JustBoolResource
     */
     public function destroy(int $customerId): JustBoolResource
     {
         $result = $this->cartService->delete($customerId);
         return new JustBoolResource($result);
     }
}
