<?php

namespace App\Services;

use App\Data\DTO\Order\CreateOrderDTO;
use App\Events\OrderCreated;
use App\Exceptions\CreateOrderException;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

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

    public function create(CreateOrderDTO $DTO): Collection|JsonResponse
    {
        $order = Order::create($DTO->toArray());
        $this->addFoodsIntoOrder($DTO->customerId, $order->id);

        //отправка письма на почту через событие
        event(new OrderCreated($order));
        return Order::with('foods')->where('id',$order->id)->get();
    }

    public function addFoodsIntoOrder(int $userId, int $orderId)
    {
        $user = User::find($userId);
        //получение корзины пользователя
        $cart = $user->cart;
        if ($cart == null){
            throw new CreateOrderException('У пользователя нет корзины');
        }
        //получение продуктов из корзины
        $foods = $cart->foods;
        if ($foods->isEmpty()) {
            throw new CreateOrderException('Корзина пуста');
        }
        //добавление продуктов в заказ
        $order = Order::find($orderId);
        foreach ($foods as $food) {
            $price = $food->price * $food->pivot->quantity;
            $order->foods()->attach($food->id, ['quantity' => $food->pivot->quantity, 'price' => $price]);
        }
    }

    public function delete(int $id): bool
    {
        $order = Order::find($id);
        $order->foods()->detach();
        $order->delete();

        Log::channel('daily_order')->info("Пользователь {$order->user->getName()} удалил заказ");
        return true;
    }
}
