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
        Schema::create('public_operations', function (Blueprint $table) {
            $table->id();
//             ""
// ""
// "row_id"
// "updated_by"
// "updated_at"
// "operation"
            $table->text('table_name')->nullable();
            $table->json('field_name');
            $table->bigInteger('row_id');
            $table->string('updated_by');
            $table->timestamp('updated_at');
            $table->text('operation');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('public_operations');
    }
};
