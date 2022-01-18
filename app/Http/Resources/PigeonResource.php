<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PigeonResource extends JsonResource
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
            'name' => $this->name,
            'speed' => $this->speed,
            'range' => $this->range,
            'cost' => $this->cost,
            'downtime' => $this->downtime,
            'uptime' => $this->uptime??null,
            'status' => $this->status
        ];
    }
}
