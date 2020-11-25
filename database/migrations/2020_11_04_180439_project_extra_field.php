<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectExtraField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('project_extra_field', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("extra_id")->unsigned();
            $table->foreign('extra_id')->references('id')->on('extra_fields')->onDelete('cascade');
            $table->integer("project_id")->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
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
      Schema::dropIfExists('project_extra_field');
    }
}
