<?php

namespace App\Application\Requests\Website\Assignment;

use Illuminate\Foundation\Http\FormRequest;

class AddRequestAssignment extends FormRequest
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
        return [
            "trainee_id" => "integer",
			"supervisor_id" => "integer",
			"report_path" => "",
			
        ];
    }
}
