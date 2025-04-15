<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Attendance;
use App\Application\Requests\Website\Attendance\AddRequestAttendance;
use App\Application\Requests\Website\Attendance\UpdateRequestAttendance;

class AttendanceController extends AbstractController
{

     public function __construct(Attendance $model)
     {
        parent::__construct($model);
     }

     public function index(){
        $items = $this->model;

        if(request()->has('from') && request()->get('from') != ''){
            $items = $items->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $items = $items->whereDate('created_at' , '<=' , request()->get('to'));
        }

			if(request()->has("trainee_id") && request()->get("trainee_id") != ""){
				$items = $items->where("trainee_id","=", request()->get("trainee_id"));
			}

			if(request()->has("supervisor_id") && request()->get("supervisor_id") != ""){
				$items = $items->where("supervisor_id","=", request()->get("supervisor_id"));
			}

			if(request()->has("date") && request()->get("date") != ""){
				$items = $items->where("date","=", request()->get("date"));
			}

			if(request()->has("status") && request()->get("status") != ""){
				$items = $items->where("status","=", request()->get("status"));
			}

			if(request()->has("notes") && request()->get("notes") != ""){
				$items = $items->where("notes","like", "%".request()->get("notes")."%");
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.attendance.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.attendance.edit' , $id);
     }

     public function store(AddRequestAttendance $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('attendance');
     }

     public function update($id , UpdateRequestAttendance $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.attendance.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'attendance')->with('sucess' , 'Done Delete Attendance From system');
     }


}
