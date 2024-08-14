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
        Schema::create('farm_groups', function (Blueprint $table) {
            $table->id();
            // farm group eg : farms 1,2,3,78, is owned by person Adam , farms 4,5,6,9,10 owned by jack, Adam farms connected with group
            // also farm group work as organization linker , company or other

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });


        // workers should be connected to the farming group
        // updating migration to handle the relationship
        Schema::table('users',function(Blueprint $table){
            $table->foreignId('farm_group_id')->nullable()->constrained('farm_groups')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['farm_group_id']);
            $table->dropColumn('farm_group_id');
        });
        Schema::dropIfExists('farm_groups');
    }
};
