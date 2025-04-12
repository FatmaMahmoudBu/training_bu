<?php

namespace App\Application\Requests\Website\Workshop;


class ApiAddRequestWorkshop
{
    public function rules()
    {
        return [
            "title" => "required",
			"description" => "",
			
        ];
    }
}
