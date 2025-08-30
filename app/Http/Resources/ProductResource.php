<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
          return [
            'id' => $this->id,
            'name_product' => $this->name_product,
            'description' => $this->description,
            'image' => $this->image,
            'detail_price' => $this->detail_price,
            'wholesale_price' => $this->wholesale_price,
            //'created_at' => $this->created_at->format(''),
        ];
    }
}
