<?php

namespace App\Application\Requests\Website\Faculty;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestFaculty
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "name" => "min:1|max:200|required",
			
        ];
    }
}
