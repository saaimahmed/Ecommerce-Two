<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_cancels', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('customer_id');
            $table->integer('order_total');
            $table->integer('tax_total');
            $table->integer('shipping_total');
            $table->text('order_date');
            $table->text('cancel_date');
            $table->text('payment_type');
            $table->longText('product_info');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_cancels');
    }
};
