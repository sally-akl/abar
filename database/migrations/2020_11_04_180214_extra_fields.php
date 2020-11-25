<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExtraFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('extra_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string("field_label_title");
            $table->string("field_form_name");
            $table->string("field_form_type");
            $table->boolean("is_require")->default(0);
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
        Schema::dropIfExists('extra_fields');
    }
}
