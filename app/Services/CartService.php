<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Collection;

class CartService
{
    public function getAll(): Collection
    {
        return Cart::all();
    }

    public function getByUserId(int $customerId): Collection
    {
        return Cart::with('foods')->where('customer_id', $customerId)->get();
    }

    public function create(int $customerId): Cart
    {
        $cart = Cart::where('customer_id', $customerId)->first();
        if ($cart == null) {
            $cart = Cart::create(['customer_id' => $customerId]);
        }
        return $cart;
    }

    public function addFood(int $foodId, int $quantity, int $customerId)
    {
        $cart = Cart::where('customer_id', $customerId)->first();
        $cart->foods()->attach($foodId, ['quantity' => $quantity]);

        return true;
    }

    public function delete(int $customerId)
    {
        $cart = Cart::where('customer_id', $customerId)->first();
        $cart->foods()->detach();
        $cart->delete();

        return true;
    }

}
