<?php
 namespace App\Application\Requests\Website\Trainee;
  class ApiAddRequestTrainee
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
