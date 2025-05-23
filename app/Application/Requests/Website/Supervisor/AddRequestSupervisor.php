<?php
 namespace App\Application\Requests\Website\Supervisor;
 use Illuminate\Foundation\Http\FormRequest;
 class AddRequestSupervisor extends FormRequest
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
        	"school_id" => "required|integer",
            "name.*" => "",
   "email" => "",
   "phone" => "",
   "image" => "image",
   "school_id" => "integer",
            ];
    }
}
