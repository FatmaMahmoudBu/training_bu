<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Team;
use App\Application\Transformers\TeamTransformers;
use App\Application\Requests\Website\Team\ApiAddRequestTeam;
use App\Application\Requests\Website\Team\ApiUpdateRequestTeam;

class TeamApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Team $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestTeam $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestTeam $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(TeamTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(TeamTransformers::transform($data) + $paginate), $status_code);
    }

}
