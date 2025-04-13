<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Trainee;
use App\Application\Transformers\TraineeTransformers;
use App\Application\Requests\Website\Trainee\ApiAddRequestTrainee;
use App\Application\Requests\Website\Trainee\ApiUpdateRequestTrainee;

class TraineeApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Trainee $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestTrainee $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestTrainee $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(TraineeTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(TraineeTransformers::transform($data) + $paginate), $status_code);
    }

}
