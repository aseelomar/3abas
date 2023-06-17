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
            $table->string('product_name_ar');
            $table->string('product_name_en');
            $table->text('product_description_en');
            $table->text('product_description_ar');
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('sub_category_id')->nullable();
            $table->enum('status', ['active', 'inactive', 'blocked']);
            $table->float('product_price')->default(0);
            $table->float('product_sale_price')->default(0);
            $table->float('inventory')->default(0);
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
        Schema::dropIfExists('products');
    }
};
