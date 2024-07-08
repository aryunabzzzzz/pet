<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $customer_id
 *
 * @property-read User|BelongsTo $user
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
        'customer_id'
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
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    /**
     * @return BelongsToMany
     */
    public function foods(): BelongsToMany
    {
        return $this->belongsToMany(Food::class, 'cart_items')->withPivot('quantity')->withTimestamps();
    }
}
