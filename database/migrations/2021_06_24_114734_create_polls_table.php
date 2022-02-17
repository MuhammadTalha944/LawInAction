<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question');
            $table->string('options')->nullable();
            $table->string('user_id');

            $table->string('proofread_by')->nullable();
            $table->string('proofreaded_question')->nullable();

            $table->string('translated_by')->nullable();
            $table->string('translated_question')->nullable();
            
            $table->string('published_by')->nullable();       
            $table->string('published_at')->nullable();        


            $table->string('published')->default(0)->comment('0:Un Published, 1 : Published');
            $table->string('unpublished_by')->nullable();

            $table->tinyInteger('redressal_status')->comment('0:initial question,1:send to editor,2:send to proofreader,5:send to translator,4:published, 5:rejected');

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
        Schema::dropIfExists('polls');
    }
}
