<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Workshop;
use App\Application\Transformers\WorkshopTransformers;
use App\Application\Requests\Website\Workshop\ApiAddRequestWorkshop;
use App\Application\Requests\Website\Workshop\ApiUpdateRequestWorkshop;

class WorkshopApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Workshop $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestWorkshop $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestWorkshop $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(WorkshopTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(WorkshopTransformers::transform($data) + $paginate), $status_code);
    }

}
