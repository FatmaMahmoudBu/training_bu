<?php
 namespace App\Application\Requests\Website\Supervisor_trainee;
 use Illuminate\Support\Facades\Route;
 class ApiUpdateRequestSupervisor_trainee
{
    public function rules()
    {
        $id = Route::input('id');
        return [
        	"supervisor_id" => "required|integer",
         "trainee_id" => "required|integer",
            "supervisor_id" => "integer",
   "trainee_id" => "integer",
            ];
    }
}
