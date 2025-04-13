<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Evaluation;
use App\Application\Requests\Website\Evaluation\AddRequestEvaluation;
use App\Application\Requests\Website\Evaluation\UpdateRequestEvaluation;

class EvaluationController extends AbstractController
{

     public function __construct(Evaluation $model)
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

			if(request()->has("comments") && request()->get("comments") != ""){
				$items = $items->where("comments","like", "%".request()->get("comments")."%");
			}

			if(request()->has("score") && request()->get("score") != ""){
				$items = $items->where("score","=", request()->get("score"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.evaluation.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.evaluation.edit' , $id);
     }

     public function store(AddRequestEvaluation $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('evaluation');
     }

     public function update($id , UpdateRequestEvaluation $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.evaluation.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'evaluation')->with('sucess' , 'Done Delete Evaluation From system');
     }


}
