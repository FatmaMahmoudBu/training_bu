<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Evaluation;
use App\Application\Transformers\EvaluationTransformers;
use App\Application\Requests\Website\Evaluation\ApiAddRequestEvaluation;
use App\Application\Requests\Website\Evaluation\ApiUpdateRequestEvaluation;

class EvaluationApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Evaluation $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestEvaluation $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestEvaluation $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(EvaluationTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(EvaluationTransformers::transform($data) + $paginate), $status_code);
    }

}
