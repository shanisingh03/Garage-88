<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarService extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_category_id',
        'service_sub_category_id',
        'name',
        'slug',
        'inclusion',
        'description',
        'note',
        'status',
        'interval',
        'time_taken',
        'warranty',
        'match'
    ];

    protected $casts = [
        'inclusion' => 'json',
    ];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id', 'id');
    }

    public function subCategory()
    {
        return $this->belongsTo(ServiceSubCategory::class, 'service_sub_category_id', 'id');
    }
}
