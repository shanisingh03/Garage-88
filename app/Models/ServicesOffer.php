<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ServicesOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'garage_uuid',
        'service_id',
        'starting_price',
        'estimated_time',
        'status',
    ];

    // Define the relationship with CarService model
    public function carService()
    {
        return $this->belongsTo(CarService::class, 'service_id', 'id');
    }

    public function garage()
    {
        return $this->belongsTo(Garage::class, 'garage_uuid', 'uuid');
    }
}
