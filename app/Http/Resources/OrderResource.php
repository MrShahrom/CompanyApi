<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'id_client' => $this->client,
            'id_product' => $this->product,
            'date_of_shipment' => $this->date_of_shipment,
            'units_of_measurement' => $this->units_of_measurement,
            'price_per_unit' => $this->price_per_unit,
            'total_amount' => $this->total_amount,
            'quantity' => $this->quantity,
            'type_of_sale' => $this->type_of_sale,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
