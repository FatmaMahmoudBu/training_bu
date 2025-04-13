<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class AdministrationTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"name" => $modelOrCollection->{lang("name" , "en")},
			"address" => $modelOrCollection->{lang("address" , "en")},

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"name" => $modelOrCollection->{lang("name" , "ar")},
			"address" => $modelOrCollection->{lang("address" , "ar")},

        ];
    }

}