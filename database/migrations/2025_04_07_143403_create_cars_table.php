<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('cars', function (Blueprint $table) {
        $table->id();
        $table->string('brand');
        $table->string('model');
        $table->string('registration_number')->unique();
        $table->year('year');
        $table->decimal('rental_price_per_day', 10, 2);
        $table->integer('seating_capacity');
        $table->string('fuel_type');
        $table->string('transmission');
        $table->text('description')->nullable();
        $table->string('image_path');
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
