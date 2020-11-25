<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeepAreaFromToPeriod extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
          $table->string("deep")->nullable();
          $table->integer("from");
          $table->integer("to");
          $table->string("period_type");   // month , day
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
          $table->dropColumn('deep');
          $table->dropColumn('area');
          $table->dropColumn('from');
          $table->dropColumn('to');
          $table->dropColumn('period_type');
        });
    }
}
