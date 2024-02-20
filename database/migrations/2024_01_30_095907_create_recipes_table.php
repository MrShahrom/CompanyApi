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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_type_product');
            $table->foreign('id_type_product')->references('id')->on('type_products')->onDelete('cascade');
            $table->unsignedBigInteger('id_raw_material');
            $table->foreign('id_raw_material')->references('id')->on('raw_materials')->onDelete('cascade');
            $table->string('unit');
            $table->float('quantity');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
