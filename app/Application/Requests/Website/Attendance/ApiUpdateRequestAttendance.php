<?php

namespace App\Application\Requests\Website\Attendance;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestAttendance
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "trainee_id" => "integersupervisor|id",
			"notes" => "",
			
        ];
    }
}
