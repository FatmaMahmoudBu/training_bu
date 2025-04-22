<?php
 namespace App\Application\Requests\Admin\Trainee;
 use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
 class UpdateRequestTrainee extends FormRequest
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
   "email" => "email",
   "phone" => "",
   "image" => "image",
   "national_id" => "",
   "school_id" => "integer",
            ];
    }
}
