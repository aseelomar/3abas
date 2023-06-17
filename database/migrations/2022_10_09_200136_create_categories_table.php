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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->default(0);
            $table->string('category_name_ar');
            $table->string('category_name_en');
            $table->enum('status', ['active', 'inactive']);
            // ALTER TABLE `categories` ADD `created_by` BIGINT NULL AFTER `status`;
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
        Schema::dropIfExists('categories');
    }
};
