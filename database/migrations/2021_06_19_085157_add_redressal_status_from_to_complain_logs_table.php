<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRedressalStatusFromToComplainLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('complaint_logs', function (Blueprint $table) {
            $table->tinyInteger('redressal_status_from')->default(0)->comment('0:initial request,1:send to incharge,2:send to closer,3:send to evaluator,5:send to translator,4:rejected');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('complaint_logs', function (Blueprint $table) {
            $table->dropColumn('redressal_status_from');
        });
    }
}
