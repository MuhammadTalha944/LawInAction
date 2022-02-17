<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('mobile')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('police_station')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('category')->nullable();
            $table->string('Advocate_Lawyer_police_station')->nullable();
            $table->string('Advocate_Lawyer_pin_code')->nullable();
            $table->string('Advocate_Lawyer_practice_in')->nullable();
            $table->string('Advocate_Lawyer_practicing')->nullable();
            $table->string('Law_Student_Activist_work')->nullable();
            $table->string('Journalist_work')->nullable();
            $table->string('Writer_work')->nullable();
            $table->string('Retired_Judge_from')->nullable();
            $table->string('Retired_Judge_as')->nullable();
            $table->string('another_membership')->nullable();
            $table->longtext('correspondence_address')->nullable();
            $table->longtext('beneficial_for_our_cause')->nullable();
            $table->string('proving_your_identity')->nullable();
            $table->string('passport_photo')->nullable();
            $table->string('concent')->nullable();
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
        Schema::dropIfExists('memberships');
    }
}
