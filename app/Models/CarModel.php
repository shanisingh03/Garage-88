<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_maker_id',
        'name',
        'slug',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }
    
    public function maker()
    {
        return $this->belongsTo(CarMaker::class, 'car_maker_id', 'id');
    }

    public function variants()
    {
        return $this->hasMany(CarModelVariant::class);
    }
}
