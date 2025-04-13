<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class Supervisor_traineeTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"supervisor_id" => $modelOrCollection->supervisor_id,
			"trainee_id" => $modelOrCollection->trainee_id,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"supervisor_id" => $modelOrCollection->supervisor_id,
			"trainee_id" => $modelOrCollection->trainee_id,

        ];
    }

}