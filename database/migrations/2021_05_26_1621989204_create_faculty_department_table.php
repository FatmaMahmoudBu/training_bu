<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultydepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    		if (!Schema::hasColumn("department", "faculty_id"))
		{
	Schema::table("department", function (Blueprint $table)  {
		$table->integer("faculty_id")->unsigned();
		$table->foreign("faculty_id")->references("id")->on("faculty")->onDelete("cascade");

	});		}

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::disableForeignKeyConstraints();
		if (Schema::hasColumn("department", "faculty_id"))
		{
			$arrayOfKeys = $this->listTableForeignKeys("department");
			Schema::table("department", function ($table) use ($arrayOfKeys) {
			Schema::disableForeignKeyConstraints();
				if(in_array("department_faculty_id_foreign" , $arrayOfKeys)){
					$table->dropForeign("department_faculty_id_foreign");
					$table->dropColumn("faculty_id");
				}else{
					$table->dropColumn("faculty_id");
				}
			Schema::enableForeignKeyConstraints();
			});
		}
		Schema::enableForeignKeyConstraints();

    }
}
