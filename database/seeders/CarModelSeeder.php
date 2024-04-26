<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\CarMaker;
use App\Models\CarModel;
use App\Models\CarModelVariant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();
        try {
            $errors = [];
            //Car Makers
            $car_makers = CarMaker::all();
            foreach ($car_makers as $car_maker) {
                // Get Models
                $jsonData = Storage::disk('local')->get('/JSON/' . $car_maker->slug . '/car_models.json');
                $car_models = json_decode($jsonData);
                if (isset($car_models->items) && count($car_models->items)) {
                    # code...
                    foreach ($car_models->items as $car_model) {
                        // Save The Car Model
                        $carModelSave = CarModel::create([
                            "car_maker_id" => $car_maker->id,
                            "name" => $car_model->name,
                            "slug" => $car_model->slug,
                        ]);

                        # Get Variants
                        $jsonVariantData = Storage::disk('local')->get('/JSON/' . $car_maker->slug . '/' . $car_model->slug . '_variants.json');
                        $car_model_variants = json_decode($jsonVariantData);


                        if (isset($car_model_variants->items) && count($car_models->items)) {
                            foreach ($car_model_variants->items as $car_model_variant) {
                                # code...
                                $start_date = ($car_model_variant->date_start) ? Carbon::parse($car_model_variant->date_start)->format('Y-m-d') : null;
                                $end_date = ($car_model_variant->date_end) ? Carbon::parse($car_model_variant->date_end)->format('Y-m-d') : null;


                                // Save Car Model Variant
                                $carVariantSave = CarModelVariant::create([
                                    "car_model_id" => $carModelSave->id,
                                    "name" => $car_model_variant->name,
                                    "slug" => $car_model_variant->slug,
                                    "start_date" => $start_date,
                                    "end_date" => $end_date,
                                    "engine_liters" => $car_model_variant->engine_liters,
                                    "engine_type" => $car_model_variant->engine_type,
                                    "engine_power" => $car_model_variant->engine_power,
                                    "motor_power" => $car_model_variant->motor_power,
                                    "engine_codes" => $car_model_variant->engine_codes,
                                    "body_type" => $car_model_variant->body_type,
                                    "oem_url" => $car_model_variant->oem_url,
                                ]);
                            }
                        } else {
                            $errors[] = [
                                "error_type" => "Car Make Model Variant Not Found",
                                "car_makes" => $car_maker,
                                "car_model" => $car_model
                            ];
                        }
                    }
                } else {
                    $errors[] = [
                        "error_type" => "Car Make Model Not Found",
                        "car_makes" => $car_maker
                    ];
                }
            }

            if (count($errors) > 0) {
                # code...
                DB::rollBack();
                dd($errors);
            } else {
                # code...
                DB::commit();
                dd("DB SEED SUCCESSFULLY!");
            }
            
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
