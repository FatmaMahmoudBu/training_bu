<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Image;
use App\Application\Transformers\ImageTransformers;
use App\Application\Requests\Website\Image\ApiAddRequestImage;
use App\Application\Requests\Website\Image\ApiUpdateRequestImage;

class ImageApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Image $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestImage $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestImage $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(ImageTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(ImageTransformers::transform($data) + $paginate), $status_code);
    }

}
