<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Pigeon extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'speed',
        'range',
        'cost',
        'downtime',
        'uptime',
        'status'
    ];

    /**
     * Scope a query to only include ready pigeons.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeReady($query)
    {
        return $query->where('status', 'ready');
    }

    /**
     * Scope a query to only include pigeons that can reach the destination.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeReachable($query, $distance)
    {
        return $query->where('range','>=', $distance);
    }


}
