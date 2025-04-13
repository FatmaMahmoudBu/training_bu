<?php

namespace App\Application\Requests\Website\Administration;


class ApiAddRequestAdministration
{
    public function rules()
    {
        return [
            "name" => "",
			"address" => "",
			
        ];
    }
}
