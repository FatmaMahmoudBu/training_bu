<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Assignment;
use App\Application\Requests\Website\Assignment\AddRequestAssignment;
use App\Application\Requests\Website\Assignment\UpdateRequestAssignment;

class AssignmentController extends AbstractController
{

     public function __construct(Assignment $model)
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

			if(request()->has("report_path") && request()->get("report_path") != ""){
				$items = $items->where("report_path","=", request()->get("report_path"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.assignment.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.assignment.edit' , $id);
     }

     public function store(AddRequestAssignment $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('assignment');
     }

     public function update($id , UpdateRequestAssignment $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.assignment.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'assignment')->with('sucess' , 'Done Delete Assignment From system');
     }


}
