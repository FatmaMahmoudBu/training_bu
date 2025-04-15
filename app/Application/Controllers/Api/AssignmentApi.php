<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Assignment;
use App\Application\Transformers\AssignmentTransformers;
use App\Application\Requests\Website\Assignment\ApiAddRequestAssignment;
use App\Application\Requests\Website\Assignment\ApiUpdateRequestAssignment;

class AssignmentApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Assignment $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestAssignment $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestAssignment $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(AssignmentTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(AssignmentTransformers::transform($data) + $paginate), $status_code);
    }

}
