<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHateFormLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hate_form_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('hate_form_id');
            $table->foreign('hate_form_id')->references('id')->on('hate_forms')->onDelete('cascade');
            $table->tinyInteger('redressal_status_from')->default(0)->comment('0:initial request,1:send to incharge,2:send to closer,3:send to evaluator,5:send to translator,4:rejected');
            $table->tinyInteger('redressal_status')->comment('0:initial request,1:send to incharge,2:send to closer,3:send to evaluator,5:send to translator,4:rejected');
            $table->string('remarks')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('hate_form_logs');
    }
}
