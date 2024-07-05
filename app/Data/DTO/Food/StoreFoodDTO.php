<?php

namespace App\Data\DTO\Food;
class StoreFoodDTO
{
    public function __construct(
        //в чем разница между public и private?
        public readonly string $name,
        public readonly int $categoryId,
        public readonly float $price,
        public readonly string|null $description,
        public readonly int|null $imgId
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
          'description' => $this->description,
          'img_id' => $this->imgId
        ];
    }
}
