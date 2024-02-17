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
        Schema::create('product_sizes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id');
            $table->bigInteger('size_id');
            $table->decimal('price');
            $table->decimal('offer_price')->nullable();
            $table->date('offer_from')->nullable();
            $table->date('offer_to')->nullable();
            $table->enum('status', [0, 1])->default(1);
            $table->text('description')->nullable();
            $table->decimal('quantity')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
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
