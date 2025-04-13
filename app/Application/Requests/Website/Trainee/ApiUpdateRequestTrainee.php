<?php
 namespace App\Application\Requests\Website\Trainee;
 use Illuminate\Support\Facades\Route;
 class ApiUpdateRequestTrainee
{
    public function rules()
    {
        $id = Route::input('id');
        return [
        	"school_id" => "required|integer",
            "name" => "email",
   "school_id" => "integer",
            ];
    }
}
