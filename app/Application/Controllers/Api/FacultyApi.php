<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Faculty;
use App\Application\Transformers\FacultyTransformers;
use App\Application\Requests\Website\Faculty\ApiAddRequestFaculty;
use App\Application\Requests\Website\Faculty\ApiUpdateRequestFaculty;

class FacultyApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Faculty $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestFaculty $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestFaculty $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(FacultyTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(FacultyTransformers::transform($data) + $paginate), $status_code);
    }

}
