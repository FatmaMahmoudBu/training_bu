<?php
 namespace App\Application\Requests\Website\School;
  class ApiAddRequestSchool
{
    public function rules()
    {
        return [
        	"administration_id" => "required|integer",
            "name" => "address.*",
   "administration_id" => "integer",
            ];
    }
}
