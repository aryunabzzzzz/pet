<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 *
 * @property-read Food|HasMany $food
 */
class Category extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'categories';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name'
    ];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Category
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return HasMany
     */
    public function foods(): HasMany
    {
        return $this->hasMany(Food::class, 'category_id', 'id');
    }

}
