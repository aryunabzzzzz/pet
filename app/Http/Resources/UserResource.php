<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            /** @var int $id */
            'id'=>$this->resource->getId(),
            /** @var int $role_id */
            'role_id'=>$this->resource->getRoleId(),
            'name'=>$this->resource->getName()
        ];
    }
}
