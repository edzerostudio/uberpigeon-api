<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Http\Requests\Delivery\StoreRequest;

class Delivery extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'distance',
        'deadline',
        'cost',
        'pigeon',
        'estimated_arrival',
        'status'
    ];

    public function calculateCost(StoreRequest $request){
        $request->cost = $request->distance*2;        

        return $request;
    }

    public function findPigeon(StoreRequest $request){
        $pigeons = Pigeon::get()->where('range','>=',$request->distance)->where('status','ready');
        
        foreach($pigeons as $pigeon){
            if((Carbon::now()->addHours($request->distance/$pigeon->speed))->lt(Carbon::parse($request->deadline))){
                $request->status = 'delivering';
                
                $request->deadline = Carbon::parse($request->deadline)->format('Y-m-d h:i:s');
                $request->estimated_arrival = Carbon::now()->addHours($request->distance/$pigeon->speed)->format('Y-m-d h:i:s');
            
                $pigeon->uptime = Carbon::now()->addHours(($request->distance/$pigeon->speed)+$pigeon->downtime)->format('Y-m-d h:i:s');
                $pigeon->status = 'flying';
                $pigeon->save();

                $request->pigeon = $pigeon;
                break;
            }
        }   

        if(!isset($request->pigeon)){
            $request->status = 'cancelled';
        }

        return $request;
    }
}
