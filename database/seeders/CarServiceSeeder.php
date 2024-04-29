<?php

namespace Database\Seeders;

use App\Models\CarService;
use Illuminate\Support\Str;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();
        try {
            $jsonData = Storage::disk('local')->get('/Service//top-services.json');
            $services = json_decode($jsonData);

            if (isset($services->data)) {

                foreach ($services->data as $serviceMajor) {

                    foreach ($serviceMajor as $service) {

                        // Create Or Update Category Name
                        $category_id = $this->createOrUpdateCategory($service->category_name);

                        // Create or Update Sub Category
                        $sub_category_id = $this->createOrUpdateSubCategory($category_id, $service->name);

                        // Create Car Services
                        foreach ($service->services as $car_service) {
                            # Create Car Service
                            CarService::create([
                                'service_category_id' => $category_id,
                                'service_sub_category_id' => $sub_category_id,
                                'name' => $car_service->name,
                                'slug' => Str::slug($car_service->name),
                                'inclusion' => isset($car_service->desc_details) ? json_encode($this->getInclusions($car_service->desc_details->inclusion)) : null,
                                'interval' => isset($car_service->desc_details) ? (isset($car_service->desc_details->interval) ? $car_service->desc_details->interval : null) : null,
                                'time_taken' => isset($car_service->desc_details) ? (isset($car_service->desc_details->time_taken) ? $car_service->desc_details->time_taken : null) : null,
                                'warranty' => isset($car_service->desc_details) ? (isset($car_service->desc_details->warranty) ? $car_service->desc_details->warranty : null) : null,
                                'match' => isset($car_service->desc_details) ? (isset($car_service->desc_details->match) ? $car_service->desc_details->match : null): null,
                                'description' => isset($car_service->description) ? $car_service->description : null,
                                'note' => isset($car_service->imp_note) ? $car_service->imp_note : null,
                            ]);
                        }
                    }
                }
            }
            
            DB::commit();
            dd("Car Service DB SEED SUCCESSFULLY!");
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function createOrUpdateCategory($category_name)
    {
        $category = ServiceCategory::where('name', $category_name)->first();
        
        if ($category) {
            return $category->id;
        }

        $category = ServiceCategory::create([
            'name' => $category_name,
            'slug' => Str::slug($category_name)
        ]);

        return $category->id;
    }

    public function createOrUpdateSubCategory($category_id, $subcategory_name)
    {
        $subCategory = ServiceSubCategory::where('name', $subcategory_name)->where('service_category_id', $category_id)->first();

        if ($subCategory) {
            return $subCategory->id;
        }

        $subCategory = ServiceSubCategory::create([
            'service_category_id' => $category_id,
            'name' => $subcategory_name,
            'slug' => Str::slug($subcategory_name)
        ]);

        return $subCategory->id;
    }

    public function getInclusions($inclusions){
        $result = [];
        foreach ($inclusions as $includeItems) {
            if (is_array($includeItems)) {
                # code...
                foreach ($includeItems as $item) {
                    array_push($result, $item);
                }
            }else {
                # code...
                array_push($result, $includeItems);
            }
        }

        return $result;
    }
}
