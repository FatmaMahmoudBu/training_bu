<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Department;
use App\Application\Transformers\DepartmentTransformers;
use App\Application\Requests\Website\Department\ApiAddRequestDepartment;
use App\Application\Requests\Website\Department\ApiUpdateRequestDepartment;

class DepartmentApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Department $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestDepartment $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestDepartment $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(DepartmentTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(DepartmentTransformers::transform($data) + $paginate), $status_code);
    }

}
