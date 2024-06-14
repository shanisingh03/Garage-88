<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GarageStaff extends Model
{
    use HasFactory;

    protected $fillable = [
        'garage_uuid',
        'staff_uuid',
        'status',
    ];

    public function garage()
    {
        return $this->belongsTo(Garage::class, 'garage_uuid', 'uuid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'staff_uuid', 'id');
    }

}
