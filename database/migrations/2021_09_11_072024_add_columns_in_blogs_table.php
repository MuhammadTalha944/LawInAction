<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('status')->default(0)->comment('0:Initiated,1:sent to Editor,2:sent to translator,3:send to proofreader');
            $table->string('proofread_by')->nullable();
            $table->string('proofreader_remarks')->nullable();
            $table->string('translated_by')->nullable();
            $table->string('translater_remarks')->nullable();

            $table->string('published_by')->nullable();            
            $table->string('unpublished_by')->nullable();
            $table->string('published')->default(0)->comment('0:Un Published, 1 : Published');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            //
        });
    }
}
