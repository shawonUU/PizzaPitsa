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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->bigInteger('customer_id');
            $table->integer('type');
            $table->double('discount')->default(0);
            $table->double('total_amount')->default(0);
            $table->double('paid_amount')->default(0);
            $table->double('delivery_charge')->default(0);
            $table->integer('delivery_address_id')->nullable();
            $table->integer('order_status')->default(0);
            $table->timestamps();
            $table->comment('order_status: 0-Pending, 1-Processing, 2-Shipped, 3-Out for Delivery, 4-Delivered, 5-Canceled, 7-Refunded, 8-On Hold, 9-Backordered, 10-Returned');
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
