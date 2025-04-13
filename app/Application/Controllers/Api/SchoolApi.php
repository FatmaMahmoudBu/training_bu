<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\School;
use App\Application\Transformers\SchoolTransformers;
use App\Application\Requests\Website\School\ApiAddRequestSchool;
use App\Application\Requests\Website\School\ApiUpdateRequestSchool;

class SchoolApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(School $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestSchool $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestSchool $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(SchoolTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(SchoolTransformers::transform($data) + $paginate), $status_code);
    }

}
