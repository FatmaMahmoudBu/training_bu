<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Attendance;
use App\Application\Transformers\AttendanceTransformers;
use App\Application\Requests\Website\Attendance\ApiAddRequestAttendance;
use App\Application\Requests\Website\Attendance\ApiUpdateRequestAttendance;

class AttendanceApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Attendance $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestAttendance $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestAttendance $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(AttendanceTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(AttendanceTransformers::transform($data) + $paginate), $status_code);
    }

}
