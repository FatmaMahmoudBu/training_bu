<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Administration;
use App\Application\Requests\Website\Administration\AddRequestAdministration;
use App\Application\Requests\Website\Administration\UpdateRequestAdministration;

class AdministrationController extends AbstractController
{

     public function __construct(Administration $model)
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

			if(request()->has("address") && request()->get("address") != ""){
				$items = $items->where("address","like", "%".request()->get("address")."%");
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.administration.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.administration.edit' , $id);
     }

     public function store(AddRequestAdministration $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('administration');
     }

     public function update($id , UpdateRequestAdministration $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.administration.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'administration')->with('sucess' , 'Done Delete Administration From system');
     }


}
