<?php
 namespace App\Application\Requests\Website\Department;
  class ApiAddRequestDepartment
{
    public function rules()
    {
        return [
        	"faculty_id" => "required|integer",
            "name" => "min:1|max:200|required",
            ];
    }
}
