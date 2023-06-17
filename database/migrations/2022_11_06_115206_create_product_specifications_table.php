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
        Schema::create('product_specifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id');
            $table->string('brand_name')->nullable();
            $table->string('certificate')->nullable();
            $table->string('type')->nullable();
            $table->string('metal_stamp')->nullable();
            $table->string('main_stone')->nullable();
            $table->string('type_certificate')->nullable();
            $table->string('occasion')->nullable();
            $table->string('pattern')->nullable();
            $table->string('item_type')->nullable();
            $table->string('pattern_shape')->nullable();
            $table->string('chain_length')->nullable();
            $table->string('origin')->nullable();
            $table->string('weight')->nullable();
            $table->string('metal_type')->nullable();
            $table->string('gender')->nullable();
            $table->string('diameter')->nullable();
            $table->string('personalization')->nullable();
            $table->string('fashion')->nullable();
            $table->string('side_stone')->nullable();
            $table->string('certificate_number')->nullable();
            $table->string('model_number')->nullable();
            $table->string('stamp')->nullable();
            $table->string('created_by');

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
        Schema::dropIfExists('product_specifications');
    }
};
