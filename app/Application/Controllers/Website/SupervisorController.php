<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Supervisor;
use App\Application\Requests\Website\Supervisor\AddRequestSupervisor;
use App\Application\Requests\Website\Supervisor\UpdateRequestSupervisor;

class SupervisorController extends AbstractController
{

     public function __construct(Supervisor $model)
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

			if(request()->has("name") && request()->get("name") != ""){
				$items = $items->where("name","like", "%".request()->get("name")."%");
			}

			if(request()->has("email") && request()->get("email") != ""){
				$items = $items->where("email","=", request()->get("email"));
			}

			if(request()->has("phone") && request()->get("phone") != ""){
				$items = $items->where("phone","=", request()->get("phone"));
			}

			if(request()->has("school_id") && request()->get("school_id") != ""){
				$items = $items->where("school_id","=", request()->get("school_id"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.supervisor.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.supervisor.edit' , $id);
     }

     public function store(AddRequestSupervisor $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('supervisor');
     }

     public function update($id , UpdateRequestSupervisor $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.supervisor.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'supervisor')->with('sucess' , 'Done Delete Supervisor From system');
     }


}
