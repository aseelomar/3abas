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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->text('type')->after('email');
            $table->text('provider')->nullable()->after('type');
            $table->integer('mobile')->nullable()->after('provider');
            $table->text('location')->nullable()->after('mobile');
            $table->integer('country_id')->nullable()->after('location');
            $table->integer('is_deleted')->default('0')->after('country_id');
            $table->bigInteger('created_by')->nullable()->after('remember_token');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
