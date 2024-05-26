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
        Schema::create('payment_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id');
            $table->bigInteger('order_id');
            $table->string('order_number');
            $table->integer('payment_type');
            $table->double('amount');
            $table->string('checkout_account')->nullable();
            $table->string('checkout_algorithm')->nullable();
            $table->string('checkout_stamp')->nullable();
            $table->string('checkout_reference')->nullable();
            $table->string('checkout_status')->nullable();
            $table->string('checkout_provider')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('signature')->nullable();
            $table->timestamps();
        });
    }

    //Array ( [order_id] => 000013 [checkout-account] => 1077442 [checkout-algorithm] => sha256 [checkout-amount] => 50 [checkout-stamp] => 0.51529700 1716222762 [checkout-reference] => Rashedul Haider(6), Order Id: 000013 [checkout-status] => ok [checkout-provider] => nordea [checkout-transaction-id] => 94dd9962-16c6-11ef-9fed-23e23935cd1a [signature] => cc4ecea4f6511ec060c691c960ec29db2b4b4c5f6295dcd2bc778f947a7020fe )

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
