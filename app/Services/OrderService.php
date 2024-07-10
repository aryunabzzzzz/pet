<?php

namespace App\Services;

use App\Data\DTO\Order\CreateOrderDTO;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class OrderService
{
    public function getAll(): Collection
    {
        return Order::all();
    }

    public function getById(int $id): Collection
    {
        return Order::with('foods')->where('id', $id)->get();
    }

    public function create(CreateOrderDTO $DTO): Collection
    {
        $order = Order::create($DTO->toArray());

        $user = User::find($DTO->customerId);
        $foods = $user->cart->foods;

        foreach ($foods as $food) {
            $price = $food->price * $food->pivot->quantity;
            $order->foods()->attach($food->id, ['quantity' => $food->pivot->quantity, 'price' => $price]);
        }

        //добавить удаление(очищение) корзины
        return Order::with('foods')->where('id',$order->id)->get();
    }

    public function delete(int $id): bool
    {
        $order = Order::find($id);
        $order->foods()->detach();
        $order->delete();

        return true;
    }
}
