<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('campaign_categories_id');
            $table->string('campaign_tags_id');
            $table->string('campaign_keywords_id');

            $table->string('fund_req')->nullable();
            $table->string('amount')->nullable();
            $table->string('campaing_end_time')->nullable();
            $table->string('campaign_date')->nullable();
            $table->string('camp_end_date')->nullable();
            $table->longtext('beneficiary_details')->nullable();

            $table->longtext('story_heading')->nullable();
            $table->longtext('story_sub_heading')->nullable();
            $table->longtext('story')->nullable();

            $table->longtext('testimonial_heading')->nullable();
            $table->longtext('testimonial_sub_heading')->nullable();
            $table->longtext('testimonial')->nullable();
            
            $table->longtext('document_heading')->nullable();
            $table->longtext('document_sub_heading')->nullable();
            $table->longtext('document')->nullable();


            $table->string('lang_type')->nullable()->comment('0:English,1:Urdu,2:Hindi');
            $table->string('proofread_by')->nullable();
            $table->string('proofreaded_question')->nullable();

            $table->string('translated_by')->nullable();
            $table->string('translated_question')->nullable();
            
            $table->string('published_by')->nullable();       
            $table->string('published_at')->nullable();        


            $table->string('published')->default(0)->comment('0:Un Published, 1 : Published');
            $table->string('unpublished_by')->nullable();

            $table->tinyInteger('status')->comment('0:initiated,1:send to editor,2:send to proofreader,5:send to translator,4:published, 5:rejected');

            $table->string('user_id')->nullable();        

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
        Schema::dropIfExists('campaigns');
    }
}
