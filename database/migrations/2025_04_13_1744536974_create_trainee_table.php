<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTraineeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainee', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->nullable();
			$table->string("email")->nullable();
			$table->string("phone")->nullable();
			$table->string("national_id")->nullable();
			$table->integer("school_id")->nullable();
			
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
        Schema::dropIfExists('trainee');
    }
}
