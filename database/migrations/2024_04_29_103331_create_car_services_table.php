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
        Schema::create('car_services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_category_id');
            $table->bigInteger('service_sub_category_id');
            $table->string('name');
            $table->string('slug');
            $table->json('inclusion')->nullable();
            $table->longText('description')->nullable();
            $table->longText('interval')->nullable();
            $table->text('time_taken')->nullable();
            $table->longText('warranty')->nullable();
            $table->longText('match')->nullable();
            $table->longText('note')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_services');
    }
};
