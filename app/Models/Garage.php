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
        'location'
    ];

    protected $casts = [
        'service_days_time' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'uuid', 'uuid')->where('user_type', 3);
    }

    protected $appends = [
        'location',
    ];

    public function getLocationAttribute(): array
    {
        return [
            "lat" => (float)$this->latitude,
            "lng" => (float)$this->longitude,
            "formatted_address" => $this->attributes['location'],
        ];
    }
    
    public function setLocationAttribute(?array $location): void
    {
        if (is_array($location))
        {
            $this->attributes['latitude'] = $location['lat'];
            $this->attributes['longitude'] = $location['lng'];
            $this->attributes['location'] = $location['formatted_address'];
            // unset($this->attributes['location']);
        }
    }

    /**
     * Get the lat and lng attribute/field names used on this table
     *
     * Used by the Filament Google Maps package.
     *
     * @return string[]
     */
    public static function getLatLngAttributes(): array
    {
        return [
            'lat' => 'latitude',
            'lng' => 'longitude',
        ];
    }

   /**
    * Get the name of the computed location attribute
    *
    * Used by the Filament Google Maps package.
    *
    * @return string
    */
    public static function getComputedLocation(): string
    {
        return 'location';
    }
    

    public function staffs()
    {
        return $this->hasMany(GarageStaff::class, 'uuid', 'garage_uuid');
    }
}
