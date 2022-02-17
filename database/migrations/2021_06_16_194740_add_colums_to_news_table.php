<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsToNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {

            $table->string('proofread_by')->nullable();
            $table->string('proofreader_remarks')->nullable();

            $table->string('translated_by')->nullable();
            $table->string('translater_remarks')->nullable();
            
            $table->string('published_by')->nullable();            

            $table->string('categories')->nullable();
            $table->string('tags')->nullable();
            $table->string('keywords')->nullable();            
            $table->string('news_page_link')->nullable();            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            //
        });
    }
}
