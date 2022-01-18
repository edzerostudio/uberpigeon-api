<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Delivery;
use App\Models\Pigeon;
use App\Http\Requests\Delivery\StoreRequest;
use App\Http\Resources\DeliveryResource;
use App\Http\Resources\DeliveryCollection;

class DeliveryController extends Controller
{
    public function __construct(Delivery $delivery, Pigeon $pigeon)
    {
        $this->delivery = $delivery;
        $this->pigeon = $pigeon;
    }

    public function index()
    {
        $delivery = $this->delivery->get();
        
        return new DeliveryCollection($delivery);
    }

    public function store(StoreRequest $request)
    {
        $request = $this->delivery->calculateCost($request);
        $request = $this->delivery->findPigeon($request);
        
        $delivery = $this->delivery->create($request->validated());
        
        return new DeliveryResource($delivery);
    }
}
