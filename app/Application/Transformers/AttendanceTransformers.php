<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class AttendanceTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"trainee_id" => $modelOrCollection->trainee_id,
			"supervisor_id" => $modelOrCollection->supervisor_id,
			"date" => $modelOrCollection->date,
			"status" => $modelOrCollection->status,
			"notes" => $modelOrCollection->{lang("notes" , "en")},

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"trainee_id" => $modelOrCollection->trainee_id,
			"supervisor_id" => $modelOrCollection->supervisor_id,
			"date" => $modelOrCollection->date,
			"status" => $modelOrCollection->status,
			"notes" => $modelOrCollection->{lang("notes" , "ar")},

        ];
    }

}