<?php

namespace App\Application\Requests\Website\School;


class ApiAddRequestSchool
{
    public function rules()
    {
        return [
            "name" => "address.*",
			"administration_id" => "integer",
			
        ];
    }
}
