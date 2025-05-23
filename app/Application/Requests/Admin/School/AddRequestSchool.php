<?php
 namespace App\Application\Requests\Admin\School;
 use Illuminate\Foundation\Http\FormRequest;
 class AddRequestSchool extends FormRequest
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
        	"administration_id" => "required|integer",
            "name.*" => "",
   "address.*" => "",
   "image" => "image",
   "administration_id" => "integer",
            ];
    }
}
