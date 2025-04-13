<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Supervisor;
use App\Application\Transformers\SupervisorTransformers;
use App\Application\Requests\Website\Supervisor\ApiAddRequestSupervisor;
use App\Application\Requests\Website\Supervisor\ApiUpdateRequestSupervisor;

class SupervisorApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Supervisor $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestSupervisor $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestSupervisor $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(SupervisorTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(SupervisorTransformers::transform($data) + $paginate), $status_code);
    }

}
