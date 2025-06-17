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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->integer('year');
            $table->decimal('daily_price' , 10,2);
            $table->enum('transmission_type' , ['manual' , 'automatic']);
            $table->enum('fuel_type' , ['petrol' , 'diesel' ,'electric' ,'hybrid']);
            $table->tinyInteger('seat_count')->unsigned();
            $table->smallInteger('luggage_capacity')->unsigned()->nullable();
            $table->longText('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
