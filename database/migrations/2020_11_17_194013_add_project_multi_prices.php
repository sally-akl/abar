<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectMultiPrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('project_multi_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("project_id")->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->string("project_details");
            $table->integer("prayer_num");
            $table->string("ceil_type");
            $table->integer("area");
            $table->float("price");
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
      Schema::dropIfExists('project_multi_prices');
    }
}
