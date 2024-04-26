<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModelVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_model_id',
        'name',
        'slug',
        'start_date',
        'end_date',
        'engine_liters',
        'engine_type',
        'engine_power',
        'motor_power',
        'engine_codes',
        'body_type',
        'oem_url',
        'status'
    ];

    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }
}
