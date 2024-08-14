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

       // farm group moved to separate migration

        Schema::create('farms', function (Blueprint $table) {
            $table->id();

            $table->foreignId('farm_group_id')->nullable()->constrained('farm_groups')->onDelete('cascade');

            $table->string('name');
            $table->string('location'); // text address
            $table->double('size'); // Area in hectares or acres
            $table->string('crop_type')->nullable(); // Optional: Crops type
            $table->text('description')->nullable(); // Optional: Detailed farm description

            // will add geolocation data later

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        // Remove foreign key constraint and drop farm_group_id column from users table
        // Schema::table('users', function (Blueprint $table) {
        //     $table->dropForeign(['farm_group_id']);
        //     $table->dropColumn('farm_group_id');
        // });

        // Drop farm_groups table
        // Schema::dropIfExists('farm_groups');

        // Drop farms table
        Schema::dropIfExists('farms');
    }
};
