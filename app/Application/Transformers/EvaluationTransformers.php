<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class EvaluationTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"trainee_id" => $modelOrCollection->trainee_id,
			"supervisor_id" => $modelOrCollection->supervisor_id,
			"comments" => $modelOrCollection->{lang("comments" , "en")},
			"score" => $modelOrCollection->score,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"trainee_id" => $modelOrCollection->trainee_id,
			"supervisor_id" => $modelOrCollection->supervisor_id,
			"comments" => $modelOrCollection->{lang("comments" , "ar")},
			"score" => $modelOrCollection->score,

        ];
    }

}