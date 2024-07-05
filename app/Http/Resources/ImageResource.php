<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    public $resource;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->resource->getId(),
            'path'=>$this->resource->getPath()
        ];
    }
}
