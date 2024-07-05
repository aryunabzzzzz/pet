<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $order_id
 * @property int $food_id
 * @property int $quantity
 * @property float $price
 *
 *
 */
class OrderItem extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $table = 'order_items';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'order_id',
        'food_id',
        'quantity',
        'price'
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
    public function getOrderId(): int
    {
        return $this->order_id;
    }

    /**
     * @param int $order_id
     * @return OrderItem
     */
    public function setOrderId(int $order_id): self
    {
        $this->order_id = $order_id;
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
     * @return OrderItem
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
     * @return OrderItem
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return OrderItem
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }


}
