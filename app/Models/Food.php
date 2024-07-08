<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property float $price
 * @property string|null $description
 * @property int|null $img_id
 *
 * @property-read Category|HasOne $category
 * @property-read Image|HasOne $image
 */
class Food extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'foods';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'category_id',
        'price',
        'description',
        'img_id'
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
     * @return Food
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    /**
     * @param int $category_id
     * @return Food
     */
    public function setCategoryId(int $category_id): self
    {
        $this->category_id = $category_id;
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
     * @return Food
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): string|null
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Food
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getImgId(): int|null
    {
        return $this->img_id;
    }

    /**
     * @param int $img_id
     * @return Food
     */
    public function setImgId(int $img_id): self
    {
        $this->img_id = $img_id;
        return $this;
    }

    /**
     * @return HasOne
     */
    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    /**
     * @return HasOne
     */
    public function image(): HasOne
    {
        return $this->hasOne(Image::class, 'id', 'img_id');
    }


}