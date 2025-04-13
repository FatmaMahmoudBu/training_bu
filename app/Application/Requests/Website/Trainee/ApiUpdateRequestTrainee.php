<?php

namespace App\Application\Requests\Website\Trainee;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestTrainee
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "name" => "email",
			"school_id" => "integer",
			
        ];
    }
}
