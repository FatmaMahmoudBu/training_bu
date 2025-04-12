<?php
 namespace App\Application\Requests\Website\Department;
 use Illuminate\Support\Facades\Route;
 class ApiUpdateRequestDepartment
{
    public function rules()
    {
        $id = Route::input('id');
        return [
        	"faculty_id" => "required|integer",
            "name" => "min:1|max:200|required",
            ];
    }
}
