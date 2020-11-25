<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string("transaction_num");
            $table->integer("project_id")->unsigned()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null');
            $table->integer("request_id")->unsigned()->nullable();
            $table->foreign('request_id')->references('id')->on('requests')->onDelete('set null');
            $table->timestamp('transfer_date');
            $table->integer("is_payable");
            $table->string("transfer_payment_type");
            $table->string("paymentToken");
            $table->string("paymentId");
            $table->float("amount");
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
      Schema::dropIfExists('transactions');
    }
}
