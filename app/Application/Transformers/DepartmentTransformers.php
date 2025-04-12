<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class DepartmentTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"name" => $modelOrCollection->{lang("name" , "en")},

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"name" => $modelOrCollection->{lang("name" , "ar")},

        ];
    }

}