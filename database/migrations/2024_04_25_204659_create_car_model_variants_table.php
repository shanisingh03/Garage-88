<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_model_variants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('car_model_id');
            $table->string('name');
            $table->string('slug');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('engine_liters')->nullable();
            $table->string('engine_type')->nullable();
            $table->string('engine_power')->nullable();
            $table->string('motor_power')->nullable();
            $table->string('engine_codes')->nullable();
            $table->string('body_type')->nullable();
            $table->string('oem_url')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_model_variants');
    }
};
