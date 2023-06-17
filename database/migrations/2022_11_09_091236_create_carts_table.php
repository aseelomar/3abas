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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id');
            $table->float('discount')->nullable();;
            $table->float('total_discount')->nullable();;
            $table->float('product_sale_price');
            $table->float('total_price');
            $table->bigInteger('count');
            $table->string('size')->nullable();
            $table->unsignedBigInteger('color_id')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->integer('is_delete')->default(0);
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
        Schema::dropIfExists('carts');
    }
};
