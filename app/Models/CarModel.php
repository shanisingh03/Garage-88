<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_maker_id',
        'name',
        'slug',
        'status'
    ];

    public function maker()
    {
        return $this->belongsTo(CarMaker::class);
    }

    public function variants()
    {
        return $this->hasMany(CarModelVariant::class);
    }
}
