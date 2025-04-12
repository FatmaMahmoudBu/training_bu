<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class SliderTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"image" => $modelOrCollection->image,
			"title" => $modelOrCollection->{lang("title" , "en")},
			"text" => $modelOrCollection->{lang("text" , "en")},
			"date" => $modelOrCollection->date,
			"body" => $modelOrCollection->{lang("body" , "en")},
			"gallery" => $modelOrCollection->{lang("gallery" , "en")},
			"video" => $modelOrCollection->video,
			"status" => $modelOrCollection->{lang("status" , "en")},
			"presentation" => $modelOrCollection->{lang("presentation" , "en")},

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"image" => $modelOrCollection->image,
			"title" => $modelOrCollection->{lang("title" , "ar")},
			"text" => $modelOrCollection->{lang("text" , "ar")},
			"date" => $modelOrCollection->date,
			"body" => $modelOrCollection->{lang("body" , "ar")},
			"gallery" => $modelOrCollection->{lang("gallery" , "ar")},
			"video" => $modelOrCollection->video,
			"status" => $modelOrCollection->{lang("status" , "ar")},
			"presentation" => $modelOrCollection->{lang("presentation" , "ar")},

        ];
    }

}