<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class TraineeTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"name" => $modelOrCollection->{lang("name" , "en")},
			"email" => $modelOrCollection->email,
			"phone" => $modelOrCollection->phone,
			"national_id" => $modelOrCollection->national_id,
			"school_id" => $modelOrCollection->school_id,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"name" => $modelOrCollection->{lang("name" , "ar")},
			"email" => $modelOrCollection->email,
			"phone" => $modelOrCollection->phone,
			"national_id" => $modelOrCollection->national_id,
			"school_id" => $modelOrCollection->school_id,

        ];
    }

}