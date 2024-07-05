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
            'id'=>$this->resource->getId(),
            'role_id'=>$this->resource->getRoleId(),
            'name'=>$this->resource->getName(),
            'avatar_id'=>$this->resource->getAvatarId(),
        ];
    }
}
