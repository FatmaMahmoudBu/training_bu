<?php

namespace App\Application\Requests\Website\Slider;


class ApiAddRequestSlider
{
    public function rules()
    {
        return [
            "image" => "imagetitle.*",
			"presentation" => "",
			
        ];
    }
}
