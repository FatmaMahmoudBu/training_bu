<?php

namespace App\Application\Requests\Website\Faculty;


class ApiAddRequestFaculty
{
    public function rules()
    {
        return [
            "name" => "min:1|max:200|required",
			
        ];
    }
}
