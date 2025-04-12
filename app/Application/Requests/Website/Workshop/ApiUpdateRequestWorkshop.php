<?php

namespace App\Application\Requests\Website\Workshop;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestWorkshop
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "title" => "required",
			"description" => "",
			
        ];
    }
}
