<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Gallery;
use App\Application\Transformers\GalleryTransformers;
use App\Application\Requests\Website\Gallery\ApiAddRequestGallery;
use App\Application\Requests\Website\Gallery\ApiUpdateRequestGallery;

class GalleryApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Gallery $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestGallery $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestGallery $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(GalleryTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(GalleryTransformers::transform($data) + $paginate), $status_code);
    }

}
