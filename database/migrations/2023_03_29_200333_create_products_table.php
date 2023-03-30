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
            $table->string('product_name');
            $table->longText('product_short_description')->nullable();
            $table->longText('product_long_description')->nullable();
            $table->float('product_price');
            $table->integer('product_quantity');
            $table->integer('product_alert_quantity');
            $table->string('product_thambnail_photo')->default('default_product_alert_quantity.jpg');
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
