<?php

namespace App\Application\Requests\Website\Supervisor;


class ApiAddRequestSupervisor
{
    public function rules()
    {
        return [
            "name" => "email",
			"school_id" => "integer",
			
        ];
    }
}
