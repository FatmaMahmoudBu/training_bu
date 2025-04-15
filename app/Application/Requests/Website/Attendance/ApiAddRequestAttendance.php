<?php

namespace App\Application\Requests\Website\Attendance;


class ApiAddRequestAttendance
{
    public function rules()
    {
        return [
            "trainee_id" => "integersupervisor|id",
			"notes" => "",
			
        ];
    }
}
