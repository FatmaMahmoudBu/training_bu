<?php

namespace App\Application\Requests\Website\Attendance;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class UpdateRequestAttendance extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = Route::input('id');
        return [
            "trainee_id" => "integer",
			"supervisor_id" => "integer",
			"date" => "date",
			"status" => "",
			"notes.*" => "",
			
        ];
    }
}
