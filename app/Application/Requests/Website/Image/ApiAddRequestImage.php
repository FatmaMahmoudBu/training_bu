<?php

namespace App\Application\Requests\Website\Image;


class ApiAddRequestImage
{
    public function rules()
    {
        return [
            "title" => "description.*",
			"gallery_id" => "",
			
        ];
    }
}
