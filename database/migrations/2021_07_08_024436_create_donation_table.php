<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('campaign_id');
            $table->string('mode');
            $table->string('currency');
            $table->string('amount');
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('personal_number');
            $table->string('g_certificate');
            $table->string('user_id');
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
        Schema::dropIfExists('donation');
    }
}
