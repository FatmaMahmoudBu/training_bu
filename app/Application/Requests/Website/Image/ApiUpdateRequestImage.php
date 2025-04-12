<?php

namespace App\Application\Requests\Website\Image;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestImage
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "title" => "description.*",
			"gallery_id" => "",
			
        ];
    }
}
