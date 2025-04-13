<?php
 namespace App\Application\Requests\Website\Supervisor;
 use Illuminate\Support\Facades\Route;
 class ApiUpdateRequestSupervisor
{
    public function rules()
    {
        $id = Route::input('id');
        return [
        	"school_id" => "required|integer",
            "name" => "email",
   "school_id" => "integer",
            ];
    }
}
