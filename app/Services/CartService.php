<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Collection;

class CartService
{
    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Cart::all();
    }

    /**
     * @param int $customerId
     * @return Collection
     */
    public function getByUserId(int $customerId): Collection
    {
        return Cart::with('foods')->where('customer_id', $customerId)->get();
    }

    /**
     * @param int $customerId
     * @return Cart
     */
    public function create(int $customerId): Cart
    {
        $cart = Cart::where('customer_id', $customerId)->first();
        if ($cart == null) {
            $cart = Cart::create(['customer_id' => $customerId]);
        }
        return $cart;
    }

    /**
     * @param int $foodId
     * @param int $quantity
     * @param int $customerId
     * @return bool
     */
    public function addFood(int $foodId, int $quantity, int $customerId): bool
    {
        $cart = Cart::where('customer_id', $customerId)->first();
        $cart->foods()->attach($foodId, ['quantity' => $quantity]);

        return true;
    }

    /**
     * @param int $customerId
     * @return bool
     */
    public function delete(int $customerId): bool
    {
        $cart = Cart::where('customer_id', $customerId)->first();
        $cart->foods()->detach();
        $cart->delete();

        return true;
    }
}
