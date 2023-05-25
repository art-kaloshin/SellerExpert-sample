<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $guid
 * @property mixed $price
 * @property mixed $product_guid
 */
class PriceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'guid' => $this->guid,
            'price' => $this->price,
            'product_guid' => $this->product_guid
        ];
    }
}
