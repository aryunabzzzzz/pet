<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $cart_id
 * @property int $food_id
 * @property int $quantity
 *
 * @property-read Food|HasMany $food
 */
class CartItem extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $table = 'cart_items';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'cart_id',
        'food_id',
        'quantity'
    ];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getCartId(): int
    {
        return $this->cart_id;
    }

    /**
     * @param int $cart_id
     * @return CartItem
     */
    public function setCartId(int $cart_id): self
    {
        $this->cart_id = $cart_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getFoodId(): int
    {
        return $this->food_id;
    }

    /**
     * @param int $food_id
     * @return CartItem
     */
    public function setFoodId(int $food_id): self
    {
        $this->food_id = $food_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return CartItem
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return HasMany
     */
    public function foods(): HasMany
    {
        return $this->hasMany(Food::class);
    }


}
