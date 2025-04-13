<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Trainee;
use App\Application\Requests\Website\Trainee\AddRequestTrainee;
use App\Application\Requests\Website\Trainee\UpdateRequestTrainee;

class TraineeController extends AbstractController
{

     public function __construct(Trainee $model)
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

			if(request()->has("national_id") && request()->get("national_id") != ""){
				$items = $items->where("national_id","=", request()->get("national_id"));
			}

			if(request()->has("school_id") && request()->get("school_id") != ""){
				$items = $items->where("school_id","=", request()->get("school_id"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.trainee.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.trainee.edit' , $id);
     }

     public function store(AddRequestTrainee $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('trainee');
     }

     public function update($id , UpdateRequestTrainee $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.trainee.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'trainee')->with('sucess' , 'Done Delete Trainee From system');
     }


}
