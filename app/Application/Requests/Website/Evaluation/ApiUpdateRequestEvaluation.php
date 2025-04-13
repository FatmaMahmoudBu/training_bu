<?php

namespace App\Application\Requests\Website\Evaluation;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestEvaluation
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "trainee_id" => "integersupervisor|id",
			"score" => "integer",
			
        ];
    }
}
