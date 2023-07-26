<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('sales_channel');
            $table->string('order_id');
            $table->string('customer_id');
            $table->string('gstin');
            $table->date('ship_date');
            $table->date('deliver_date');
            $table->jsonb('billing_address');
            $table->jsonb('shipping_address');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_orders');
    }
};
