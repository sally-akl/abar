<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomerVisitsRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('visits_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("request_id")->unsigned();
            $table->foreign('request_id')->references('id')->on('requests')->onDelete('cascade');
            $table->timestamp("visit_date");
            $table->string("visit_time");
            $table->string("visit_time_type");
            $table->string("visite_admin_status");
            $table->string("reason")->nullable();
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
      Schema::dropIfExists('visits_requests');
    }
}
