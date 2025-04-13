<?php
 namespace App\Application\Requests\Website\Supervisor_trainee;
 use Illuminate\Foundation\Http\FormRequest;
 class AddRequestSupervisor_trainee extends FormRequest
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
        	"supervisor_id" => "required|integer",
         "trainee_id" => "required|integer",
            "supervisor_id" => "integer",
   "trainee_id" => "integer",
            ];
    }
}
