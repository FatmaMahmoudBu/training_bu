<?php

namespace App\Application\Requests\Admin\Image;

use Illuminate\Foundation\Http\FormRequest;

class AddRequestImage extends FormRequest
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
            "title.*" => "",
			"description.*" => "",
			"image" => "image",
			"gallery_id" => "",
			
        ];
    }
}
