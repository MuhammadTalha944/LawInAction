<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRedressalStatusToHateFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hate_forms', function (Blueprint $table) {
            $table->tinyInteger('redressal_status')->default(0)->comment('0:initial request,1:send to incharge,2:send to closer,5:send to translator,4:rejected');
            $table->string('translated_file')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hate_forms', function (Blueprint $table) {
            //
        });
    }
}
