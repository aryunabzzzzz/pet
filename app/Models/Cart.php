<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $customer_id
 * @property int $food_id
 * @property int $quantity
 *
 * @property-read User|BelongsTo $user
 * @property-read Food|HasMany $food
 */

class Cart extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'carts';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'customer_id',
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
    public function getCustomerId(): int
    {
        return $this->customer_id;
    }

    /**
     * @param int $customer_id
     * @return Cart
     */
    public function setCustomerId(int $customer_id): self
    {
        $this->customer_id = $customer_id;
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
     * @return Cart
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
     * @return Cart
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function foods(): HasMany
    {
        return $this->hasMany(Food::class);
    }
}
