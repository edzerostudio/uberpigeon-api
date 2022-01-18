<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Pigeon;
use App\Http\Requests\Pigeon\StoreRequest;
use App\Http\Resources\PigeonResource;
use App\Http\Resources\PigeonCollection;

class PigeonController extends Controller
{
    public function __construct(Pigeon $pigeon)
    {
        $this->pigeon = $pigeon;
    }

    public function index(){
        $pigeon = $this->pigeon->get();

        return new PigeonCollection($pigeon);
    }

    public function store(StoreRequest $request)
    {
        $pigeon = $this->pigeon->create($request->validated());
        
        return new PigeonResource($pigeon);
    }
}
