<?php
 namespace App\Application\Requests\Admin\Team;
 use Illuminate\Foundation\Http\FormRequest;
 class AddRequestTeam extends FormRequest
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
        	"faculty_id" => "required|integer",
            "name.*" => "",
   "position.*" => "",
   "type.*" => "",
   "image" => "image",
   "faculty_id" => "",
            ];
    }
}
