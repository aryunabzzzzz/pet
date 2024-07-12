<?php

namespace App\Data\DTO\Food;

class GetFoodDTO
{
    public function __construct(
        public readonly string|null $name,
        public readonly int|null $categoryId,
        public readonly float|null $price,
        public readonly float|null $minPrice,
        public readonly float|null $maxPrice,
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
            'categoryId' => $this->categoryId,
            'price' => $this->price,
            'minPrice' => $this->minPrice,
            'maxPrice' => $this->maxPrice,
        ];
    }

}
