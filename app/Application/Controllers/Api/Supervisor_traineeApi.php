<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Supervisor_trainee;
use App\Application\Transformers\Supervisor_traineeTransformers;
use App\Application\Requests\Website\Supervisor_trainee\ApiAddRequestSupervisor_trainee;
use App\Application\Requests\Website\Supervisor_trainee\ApiUpdateRequestSupervisor_trainee;

class Supervisor_traineeApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Supervisor_trainee $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestSupervisor_trainee $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestSupervisor_trainee $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(Supervisor_traineeTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(Supervisor_traineeTransformers::transform($data) + $paginate), $status_code);
    }

}
