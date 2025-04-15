<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class AssignmentTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"trainee_id" => $modelOrCollection->trainee_id,
			"supervisor_id" => $modelOrCollection->supervisor_id,
			"report_path" => $modelOrCollection->report_path,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"trainee_id" => $modelOrCollection->trainee_id,
			"supervisor_id" => $modelOrCollection->supervisor_id,
			"report_path" => $modelOrCollection->report_path,

        ];
    }

}