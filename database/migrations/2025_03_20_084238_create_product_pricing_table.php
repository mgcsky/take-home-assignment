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
        Schema::create('product_pricing', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("product_id");
            $table->unsignedInteger("region_id");
            $table->unsignedInteger("rental_period_id");
            $table->double("price")->default(0);
            $table->timestamps();

            $table->index(["product_id", "region_id", "rental_period_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_pricing');
    }
};
