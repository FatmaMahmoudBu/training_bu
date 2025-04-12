<?php
 namespace App\Application\Requests\Website\Team;
 use Illuminate\Support\Facades\Route;
 class ApiUpdateRequestTeam
{
    public function rules()
    {
        $id = Route::input('id');
        return [
        	"faculty_id" => "required|integer",
            "name" => "position.*",
   "faculty_id" => "",
            ];
    }
}
