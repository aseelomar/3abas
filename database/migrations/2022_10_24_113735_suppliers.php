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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name')->nullable();
            $table->string('trade_name')->nullable();
            $table->string('representative_name')->nullable();
            $table->string('representative_phone')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('pay_method')->nullable();
            $table->integer('is_visible')->default(1);
            $table->integer('is_delete')->default(0);
            $table->text('created_by')->nullable();
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
        //
    }
};
