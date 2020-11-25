<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title");
            $table->string("contract_pdf_name")->nullable();
            $table->text("content")->nullable();
            $table->string("contract_type");
            $table->timestamp("begin_date");
            $table->timestamp("end_date")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer("request_id")->unsigned();
            $table->foreign('request_id')->references('id')->on('requests')->onDelete('cascade');
            $table->timestamps();
      });
      DB::statement("ALTER TABLE contracts ADD contract_signiture MEDIUMBLOB");
      DB::statement("ALTER TABLE contracts ADD contract_signiture_two MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('contracts');
    }
}
