<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Supervisor_trainee;
use App\Application\Requests\Website\Supervisor_trainee\AddRequestSupervisor_trainee;
use App\Application\Requests\Website\Supervisor_trainee\UpdateRequestSupervisor_trainee;

class Supervisor_traineeController extends AbstractController
{

     public function __construct(Supervisor_trainee $model)
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

			if(request()->has("supervisor_id") && request()->get("supervisor_id") != ""){
				$items = $items->where("supervisor_id","=", request()->get("supervisor_id"));
			}

			if(request()->has("trainee_id") && request()->get("trainee_id") != ""){
				$items = $items->where("trainee_id","=", request()->get("trainee_id"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.supervisor_trainee.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.supervisor_trainee.edit' , $id);
     }

     public function store(AddRequestSupervisor_trainee $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('supervisor_trainee');
     }

     public function update($id , UpdateRequestSupervisor_trainee $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.supervisor_trainee.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'supervisor_trainee')->with('sucess' , 'Done Delete Supervisor_trainee From system');
     }


}
