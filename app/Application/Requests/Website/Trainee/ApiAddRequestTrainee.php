<?php
 namespace App\Application\Requests\Website\Trainee;
  class ApiAddRequestTrainee
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
