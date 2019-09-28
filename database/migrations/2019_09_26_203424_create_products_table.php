<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('sku');
            $table->boolean('status')->default(true);
            $table->float('base_price', 6, 2);
            $table->integer('individual_discount')->default(0);
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('rating')->default(0);
            $table->integer('number_of_ratings')->default(0);
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

}