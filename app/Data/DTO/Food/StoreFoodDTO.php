<?php

namespace App\Data\DTO\Food;
class StoreFoodDTO
{
    public function __construct(
        public readonly string $name,
        public readonly int $categoryId,
        public readonly float $price,
        public readonly string|null $description
    )
    {
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
          'name' => $this->name,
          'category_id' => $this->categoryId,
          'price' => $this->price,
          'description' => $this->description
        ];
    }
}
