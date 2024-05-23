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
        Schema::create('garage_staff', function (Blueprint $table) {
            $table->id();
            $table->uuid('garage_uuid');
            $table->uuid('staff_uuid');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('garage_uuid')->references('uuid')->on('garages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garage_staff');
    }
};
