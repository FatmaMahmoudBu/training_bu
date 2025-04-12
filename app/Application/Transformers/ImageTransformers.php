<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class ImageTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"title" => $modelOrCollection->{lang("title" , "en")},
			"description" => $modelOrCollection->{lang("description" , "en")},
			"image" => $modelOrCollection->image,
			"gallery_id" => $modelOrCollection->gallery_id,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"title" => $modelOrCollection->{lang("title" , "ar")},
			"description" => $modelOrCollection->{lang("description" , "ar")},
			"image" => $modelOrCollection->image,
			"gallery_id" => $modelOrCollection->gallery_id,

        ];
    }

}