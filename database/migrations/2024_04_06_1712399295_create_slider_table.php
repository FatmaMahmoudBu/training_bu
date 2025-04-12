<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider', function (Blueprint $table) {
            $table->increments('id');
            $table->string("image")->nullable();
			$table->string("title")->nullable();
			$table->longText("text")->nullable();
			$table->date("date")->nullable();
			$table->text("body")->nullable();
			$table->string("gallery")->nullable();
			$table->string("video")->nullable();
			$table->tinyInteger("status")->nullable();
			$table->text("presentation")->nullable();
			
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
        Schema::dropIfExists('slider');
    }
}
