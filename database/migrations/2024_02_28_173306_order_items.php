<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained();
            $table->string('order_number');
            $table->bigInteger('product_id');
            $table->bigInteger('size_id');
            $table->integer('quantity');
            $table->decimal('price');
            $table->decimal('total_price');
            $table->string('toping_ids');
            $table->string('toping_prices');
            $table->string('toping_qtys');
            $table->decimal('toping_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
