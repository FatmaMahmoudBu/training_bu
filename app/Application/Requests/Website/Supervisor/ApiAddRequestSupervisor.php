<?php
 namespace App\Application\Requests\Website\Supervisor;
  class ApiAddRequestSupervisor
{
    public function rules()
    {
        return [
        	"school_id" => "required|integer",
            "name" => "email",
   "school_id" => "integer",
            ];
    }
}
