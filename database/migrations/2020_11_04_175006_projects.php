<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Projects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string("project_num")->unique();
            $table->string("project_name");
            $table->string("project_photo");
            $table->string("project_status");
            $table->string("project_category");
            $table->boolean("is_require_for_request")->default(0);
            $table->boolean("add_to_store")->default(0);
            $table->float("first_price")->nullable();
            $table->integer("category_id")->unsigned();
            $table->foreign('category_id')->references('id')->on('countries')->onDelete('cascade');
            $table->integer("gov_id")->unsigned()->nullable();
            $table->foreign('gov_id')->references('id')->on('governate')->onDelete('set null');
            $table->integer("region_id")->unsigned()->nullable();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('set null');
            $table->integer("district_id")->unsigned()->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
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
      Schema::dropIfExists('projects');
    }
}
