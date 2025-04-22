<?php

namespace App\Application\Requests\Website\Administration;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestAdministration
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "name" => "",
			"address" => "",
			"image" => "image",
			
        ];
    }
}
