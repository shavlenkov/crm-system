<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResourse extends JsonResource
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
            'email' => $this->resource->email,
            'foundation_year' => $this->resource->foundation_year,
            'clients' => $this->resource->clients,
            'clients_count' => count($this->resource->clients),
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at
        ];
    }
}
