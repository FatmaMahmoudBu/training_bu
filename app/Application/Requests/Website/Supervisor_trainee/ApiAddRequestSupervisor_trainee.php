<?php

namespace App\Application\Requests\Website\Supervisor_trainee;


class ApiAddRequestSupervisor_trainee
{
    public function rules()
    {
        return [
            "supervisor_id" => "integer",
			"trainee_id" => "integer",
			
        ];
    }
}
