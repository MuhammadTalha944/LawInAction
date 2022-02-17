<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->nullable();

            $table->longtext('correspondence_address')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('police_station')->nullable();
            $table->string('pin_code')->nullable();
            
            $table->string('complaint_related_to')->nullable();
            $table->string('vistim_accused')->nullable();
            $table->string('fir_copy')->nullable();
            $table->longtext('grievance')->nullable();
            $table->string('id_proof')->nullable();
            $table->string('address_proof')->nullable();
            $table->string('photo')->nullable();
            $table->string('status_id')->nullable();
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
        Schema::dropIfExists('complaints');
    }
}
