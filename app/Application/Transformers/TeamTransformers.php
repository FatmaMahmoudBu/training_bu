<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class TeamTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"name" => $modelOrCollection->{lang("name" , "en")},
			"position" => $modelOrCollection->{lang("position" , "en")},
			"type" => $modelOrCollection->{lang("type" , "en")},
			"image" => $modelOrCollection->image,
			"faculty_id" => $modelOrCollection->faculty_id,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"name" => $modelOrCollection->{lang("name" , "ar")},
			"position" => $modelOrCollection->{lang("position" , "ar")},
			"type" => $modelOrCollection->{lang("type" , "ar")},
			"image" => $modelOrCollection->image,
			"faculty_id" => $modelOrCollection->faculty_id,

        ];
    }

}