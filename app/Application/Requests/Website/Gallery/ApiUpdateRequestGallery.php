<?php

namespace App\Application\Requests\Website\Gallery;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestGallery
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "name" => "",
			
        ];
    }
}
