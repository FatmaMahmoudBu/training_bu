<?php
 namespace App\Application\Requests\Website\Team;
  class ApiAddRequestTeam
{
    public function rules()
    {
        return [
        	"faculty_id" => "required|integer",
            "name" => "position.*",
   "faculty_id" => "",
            ];
    }
}
