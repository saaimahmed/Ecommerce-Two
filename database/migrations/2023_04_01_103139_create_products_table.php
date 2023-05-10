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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->integer('brand_id');
            $table->integer('unit_id');
            $table->string('product_name');
            $table->string('product_code');
            $table->float('regular_price',10,2);
            $table->float('selling_price',10,2);
            $table->integer('stock_amount');
            $table->text('product_short_description');
            $table->longText('product_long_description');
            $table->text('image');
            $table->tinyInteger('status')->default(1)->comment('0 => deactive , 1 => Active');
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
        Schema::dropIfExists('products');
    }
};
