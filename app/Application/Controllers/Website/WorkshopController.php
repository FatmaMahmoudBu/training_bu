<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Workshop;
use App\Application\Requests\Website\Workshop\AddRequestWorkshop;
use App\Application\Requests\Website\Workshop\UpdateRequestWorkshop;

class WorkshopController extends AbstractController
{

     public function __construct(Workshop $model)
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

			if(request()->has("title") && request()->get("title") != ""){
				$items = $items->where("title","like", "%".request()->get("title")."%");
			}

			if(request()->has("description") && request()->get("description") != ""){
				$items = $items->where("description","like", "%".request()->get("description")."%");
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.workshop.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.workshop.edit' , $id);
     }

     public function store(AddRequestWorkshop $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('workshop');
     }

     public function update($id , UpdateRequestWorkshop $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.workshop.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'workshop')->with('sucess' , 'Done Delete Workshop From system');
     }


}
