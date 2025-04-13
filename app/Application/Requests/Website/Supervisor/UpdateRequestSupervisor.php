<?php
 namespace App\Application\Requests\Website\Supervisor;
 use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
 class UpdateRequestSupervisor extends FormRequest
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
        	"school_id" => "required|integer",
            "name.*" => "",
   "email" => "",
   "phone" => "",
   "school_id" => "integer",
            ];
    }
}
