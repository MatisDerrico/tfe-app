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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); // Géré automatiquement par mysql
            $table->unsignedInteger('user_id');
            $table->dateTime('date');
            $table->unsignedInteger('employee_id');
            $table->timestamps(); // Updated et created at géré par laravel par défaut
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
