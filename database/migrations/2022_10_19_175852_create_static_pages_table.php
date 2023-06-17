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
        Schema::create('static_pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_title_ar')->nullable();
            $table->string('page_title_en')->nullable();
            $table->text('page_body_ar')->nullable();
            $table->text('page_body_en')->nullable();
            $table->string('page_image')->nullable();
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
        Schema::dropIfExists('static_pages');
    }
};
