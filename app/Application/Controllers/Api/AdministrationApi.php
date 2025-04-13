<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Administration;
use App\Application\Transformers\AdministrationTransformers;
use App\Application\Requests\Website\Administration\ApiAddRequestAdministration;
use App\Application\Requests\Website\Administration\ApiUpdateRequestAdministration;

class AdministrationApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Administration $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestAdministration $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestAdministration $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(AdministrationTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(AdministrationTransformers::transform($data) + $paginate), $status_code);
    }

}
