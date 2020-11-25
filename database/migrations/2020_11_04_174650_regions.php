<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Regions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('regions', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title");
            $table->integer("gov_id")->unsigned();
            $table->foreign('gov_id')->references('id')->on('governate')->onDelete('cascade');
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
       Schema::dropIfExists('regions');
    }
}
