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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();


            $table->foreignId('farm_group_id')->nullable()->constrained('farm_groups')->onDelete('cascade');

            $table->string('title');
            $table->text('description')->nullable();
            $table->date('due_date')->nullable();
            // 1=> idle , 2=> proccessing , 3=> complete , 4=> revise
            $table->enum('status', [1, 2, 3, 4]);

            // Foreign key constraints
            $table->foreignId('assigned_to_id')->nullable()->constrained('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
