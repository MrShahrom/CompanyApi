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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('selling_price');
            $table->unsignedBigInteger('id_sklad');
            $table->foreign('id_sklad')->references('id')->on('sklads')->onDelete('cascade');
            $table->unsignedBigInteger('id_type_product');
            $table->foreign('id_type_product')->references('id')->on('type_products')->onDelete('cascade');
            $table->integer('quantity');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
