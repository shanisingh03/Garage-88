<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'display_name',
        'registered_name',
        'contact_number',
        'contact_email',
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'country',
        'pin_code',
        'latitude',
        'longitude',
        'service_days_time',
        'cgst',
        'sgst',
        'status',
    ];

    protected $casts = [
        'service_days_time' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'uuid', 'uuid');
    }
    
    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($model) {
            $userUuid = auth()->user() ? auth()->user()->uuid : null;
            $model->uuid = $userUuid;
        });
    }
    
}
