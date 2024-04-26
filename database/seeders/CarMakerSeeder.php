<?php

namespace Database\Seeders;

use App\Models\CarMaker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarMakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonData = Storage::disk('local')->get('/JSON/car_makers.json');
        $car_makers = json_decode($jsonData);
        foreach ($car_makers->items as $make) {
            # Update or Create
            $carMaker = CarMaker::updateOrCreate([
                'name' => $make->name,
                'slug' => $make->slug,
            ]);
        }
    }
}
