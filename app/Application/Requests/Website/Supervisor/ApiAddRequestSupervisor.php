<?php
 namespace App\Application\Requests\Website\Supervisor;
  class ApiAddRequestSupervisor
{
    public function rules()
    {
        return [
        	"school_id" => "required|integer",
            "name" => "email",
			"image" => "image",
   "school_id" => "integer",
            ];
    }
}
