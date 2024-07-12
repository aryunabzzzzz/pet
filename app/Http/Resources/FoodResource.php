<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
{
    public $resource;
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            /** @var int $id */
            'id'=>$this->resource->getId(),
            'name'=>$this->resource->getName(),
            /** @var int $category_id */
            'category_id'=>$this->resource->getCategoryId(),
            /** @var float $price */
            'price'=>$this->resource->getPrice(),
            'description'=>$this->resource->getDescription(),
            'image'=>new ImageResource($this->whenLoaded('image')),
        ];
    }
}
