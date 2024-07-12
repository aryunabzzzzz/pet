<?php

namespace App\Services;

use App\Data\DTO\Order\CreateOrderDTO;
use App\Exceptions\CreateOrderException;
use App\Http\Controllers\MailController;
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
        $user = User::find($DTO->customerId);
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
        foreach ($foods as $food) {
            $price = $food->price * $food->pivot->quantity;
            $order->foods()->attach($food->id, ['quantity' => $food->pivot->quantity, 'price' => $price]);
        }
        //отправка письма на почту
        $mail = new MailController();
        $mail->send($user->getEmail(), $user->getName());

        //добавить удаление(очищение) корзины
        Log::channel('daily_order')->info("Пользователь {$user->getName()} успешно создал заказ");
        return Order::with('foods')->where('id',$order->id)->get();
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
