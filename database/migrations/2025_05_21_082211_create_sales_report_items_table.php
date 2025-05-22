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
        Schema::create('sales_report_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sales_report_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->integer('quantity_sold');
            $table->integer('quantity_remaining');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_report_items');
    }
};
