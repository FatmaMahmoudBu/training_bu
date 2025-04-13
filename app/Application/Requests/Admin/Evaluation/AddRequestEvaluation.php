<?php

namespace App\Application\Requests\Admin\Evaluation;

use Illuminate\Foundation\Http\FormRequest;

class AddRequestEvaluation extends FormRequest
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
			"comments.*" => "",
			"score" => "integer",
			
        ];
    }
}
