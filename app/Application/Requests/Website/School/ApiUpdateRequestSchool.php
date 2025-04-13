<?php

namespace App\Application\Requests\Website\School;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestSchool
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "name" => "address.*",
			"administration_id" => "integer",
			
        ];
    }
}
