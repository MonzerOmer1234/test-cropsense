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
        Schema::create('sensor_reads', function (Blueprint $table) {
            $table->id();

            $table->string('read');
            $table->foreignId('temperature_id')->nullable()->constrained('temperatures')->onDelete('cascade');
            $table->foreignId('tds_id')->nullable()->constrained('tds')->onDelete('cascade');
            $table->foreignId('humidity_id')->nullable()->constrained('humidities')->onDelete('cascade');
            $table->foreignId('soil_moisture_id')->nullable()->constrained('soil_moistures')->onDelete('cascade');
            $table->foreignId('light_id')->nullable()->constrained('lights')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensor_reads');
    }
};
