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
        Schema::create('temperatures', function (Blueprint $table) {
            $table->id();

            $table->dateTime('last_read')->nullable();
            $table->foreignId('farm_id')->constrained('farms')->onDelete('cascade');
            $table->foreignId('farm_group_id')->constrained('farm_groups')->onDelete('cascade');



            $table->string('type');
            $table->string('type_en');
            $table->string('serial_number');

            $table->double('lat');
            $table->double('lng');
            $table->boolean('is_active')->default(true);

            // $table->foreignId('type_id')->constrained('sensor_types')->onDelete('cascade');

            $table->double('min_read')->nullable();
            $table->double('max_read')->nullable();
            $table->double('ideal_read')->nullable();



            // will set fields to control notifcation an readings permissions

            // 0 => no one , 1=> admin ,2=> worker ,3=> both
            $table->enum('notifiable', [0, 1, 2, 3])->default(0);
            $table->enum('readable', [0, 1, 2, 3])->default(3);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temperatures');
    }
};
