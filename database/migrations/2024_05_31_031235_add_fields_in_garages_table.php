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
        Schema::table('garages', function (Blueprint $table) {
            $table->longText('location')->nullable()->after('pin_code');
            $table->decimal('latitude', 10, 7)->change()->nullable();
            $table->decimal('longitude', 10, 7)->change()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('garages', function (Blueprint $table) {
            $table->dropColumn('location');
            $table->decimal('latitude', 10, 7)->change()->nullable(false);
            $table->decimal('longitude', 10, 7)->change()->nullable(false);
        });
    }
};
