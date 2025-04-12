<?php

namespace App\Application\Requests\Website\News;


class ApiAddRequestNews
{
    public function rules()
    {
        return [
            "title" => "requiredtextbody",
			"image" => "image",
			
        ];
    }
}
