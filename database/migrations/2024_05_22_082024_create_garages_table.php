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
        Schema::create('garages', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('display_name');
            $table->string('registered_name');
            $table->string('contact_number');
            $table->string('contact_email');
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('pin_code');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->json('service_days_time');
            $table->decimal('cgst', 5, 2);
            $table->decimal('sgst', 5, 2);
            $table->boolean('status')->default(true);
            $table->timestamps();

            // Set up the foreign key constraint
            $table->foreign('uuid')->references('uuid')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garages');
    }
};
