<?php

namespace App\Services;

use App\Data\DTO\User\StoreUserDTO;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function index(): Collection
    {
        return User::all();
    }

    public function show(int $id): User
    {
        return User::find($id);
    }

    public function store(StoreUserDTO $DTO): User
    {
        return User::create($DTO->toArray());
    }

    public function update(StoreUserDTO $DTO, int $id): int
    {
        return User::where('id', $id)->update($DTO->toArray());
    }

    public function destroy(int $id): int
    {
        return User::destroy($id);
    }

    public function getCart(int $userId): Cart
    {
        $cart = User::find($userId)->cart;
        return $cart;
    }

    //вынести в OrderService
    public function getOrders(int $userId): Collection
    {
        $orders = User::find($userId)->orders;
        return $orders;
    }

    //вынести в OrderService
    public function getOrder(int $userId, int $orderId): Order
    {
        $order = User::find($userId)->orders()->find($orderId);
        return $order;
    }

}
