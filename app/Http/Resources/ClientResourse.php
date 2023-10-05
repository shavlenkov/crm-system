<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'surname' => $this->resource->surname,
            'email' => $this->resource->email,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at
        ];
    }
}
