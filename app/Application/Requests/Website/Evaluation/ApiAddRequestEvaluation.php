<?php

namespace App\Application\Requests\Website\Evaluation;


class ApiAddRequestEvaluation
{
    public function rules()
    {
        return [
            "trainee_id" => "integersupervisor|id",
			"score" => "integer",
			
        ];
    }
}
