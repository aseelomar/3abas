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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('number_order');
            $table->string('client_id');
            $table->string('created_by');
            $table->string('phone');
            $table->string('country');
            $table->float('total');
            $table->bigInteger('payment_method_id');
            $table->bigInteger('shipment_id');
            $table->string('image');
            $table->text('note')->nullable();
            $table->bigInteger('status_id');
            $table->date('transfer_at')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
