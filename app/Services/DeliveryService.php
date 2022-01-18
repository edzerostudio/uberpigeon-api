<?php

namespace App\Services;

use App\Models\Delivery;
use App\Models\Pigeon;

class DeliveryService
{
    public function __construct(Delivery $delivery, Pigeon $pigeon)
    {
        $this->delivery = $delivery;
        $this->pigeon = $pigeon;
    }
}
