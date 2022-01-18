<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'distance' => $this->distance,
            'deadline' => $this->deadline,
            'cost' => $this->cost,
            'pigeon' => $this->pigeon,
            'estimated_arrival' => $this->estimated_arrival,
            'status' => $this->status
        ];
    }
}
