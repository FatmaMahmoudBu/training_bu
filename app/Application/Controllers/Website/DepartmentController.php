<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Department;
use App\Application\Requests\Website\Department\AddRequestDepartment;
use App\Application\Requests\Website\Department\UpdateRequestDepartment;

class DepartmentController extends AbstractController
{

     public function __construct(Department $model)
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



        $items = $items->paginate(env('PAGINATE'));
        return view('website.department.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.department.edit' , $id);
     }

     public function store(AddRequestDepartment $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('department');
     }

     public function update($id , UpdateRequestDepartment $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.department.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'department')->with('sucess' , 'Done Delete Department From system');
     }


}
