<?php
 namespace App\Application\Requests\Website\School;
 use Illuminate\Support\Facades\Route;
 class ApiUpdateRequestSchool
{
    public function rules()
    {
        $id = Route::input('id');
        return [
        	"administration_id" => "required|integer",
            "name" => "address.*",
			"image" => "image",
   "administration_id" => "integer",
            ];
    }
}
