<?php

namespace App\Application\Requests\Website\Assignment;


class ApiAddRequestAssignment
{
    public function rules()
    {
        return [
            "trainee_id" => "integersupervisor|id",
			"report_path" => "",
			
        ];
    }
}
