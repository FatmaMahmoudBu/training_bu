<?php

namespace App\Application\Requests\Website\Trainee;


class ApiAddRequestTrainee
{
    public function rules()
    {
        return [
            "name" => "email",
			"school_id" => "integer",
			
        ];
    }
}
