<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\School;
use App\Application\Requests\Website\School\AddRequestSchool;
use App\Application\Requests\Website\School\UpdateRequestSchool;

class SchoolController extends AbstractController
{

     public function __construct(School $model)
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

			if(request()->has("administration_id") && request()->get("administration_id") != ""){
				$items = $items->where("administration_id","=", request()->get("administration_id"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.school.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.school.edit' , $id);
     }

     public function store(AddRequestSchool $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('school');
     }

     public function update($id , UpdateRequestSchool $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.school.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'school')->with('sucess' , 'Done Delete School From system');
     }


}
