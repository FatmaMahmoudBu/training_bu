<?php

namespace App\Application\Requests\Website\Assignment;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestAssignment
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "trainee_id" => "integersupervisor|id",
			"report_path" => "",
			
        ];
    }
}
