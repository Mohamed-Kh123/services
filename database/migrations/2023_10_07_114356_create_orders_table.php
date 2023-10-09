<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->json('service_data');
            $table->json('items');
            $table->double('total');
            $table->unsignedBigInteger('customer_id');
            $table->json('customer_data');
            $table->json('data')->nullable();
            $table->timestamp('booking_at');
            $table->enum('payment_method', [\App\Enum\ConstantEnum::STRIPE, \App\Enum\ConstantEnum::TAMARA, \App\Enum\ConstantEnum::TABBY,]);
            $table->double('payment_amount')->default(0);
            $table->double('remaining_amount');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
