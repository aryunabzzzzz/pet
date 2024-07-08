<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JustBoolResource extends JsonResource
{
    /**
     * @var bool $resource
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
            /**
             * @var bool $result
             */
            'result'=>$this->resource
        ];
    }
}
