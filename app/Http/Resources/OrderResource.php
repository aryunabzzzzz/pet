<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * @var
     */
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            /** @var int $id */
            'id'=>$this->resource->getId(),
            /** @var int $customer_id */
            'customer_id'=>$this->resource->getCustomerId(),
            'address'=>$this->resource->getAddress(),
            'comment'=>$this->resource->getComment(),
            'foods'=>FoodResource::collection($this->whenLoaded('foods'))
        ];
    }
}
