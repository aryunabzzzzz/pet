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
            'id'=>$this->resource->getId(),
            'name'=>$this->resource->getName(),
            'category_id'=>$this->resource->getCategoryId(),
            'price'=>$this->resource->getPrice(),
            'description'=>$this->resource->getDescription(),
            'img_id'=>$this->resource->getImgId(),
        ];
    }
}
