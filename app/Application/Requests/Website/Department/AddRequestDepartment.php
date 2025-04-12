<?php
 namespace App\Application\Requests\Website\Department;
 use Illuminate\Foundation\Http\FormRequest;
 class AddRequestDepartment extends FormRequest
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
            "name.*" => "min:1|max:200|required",
            ];
    }
}
