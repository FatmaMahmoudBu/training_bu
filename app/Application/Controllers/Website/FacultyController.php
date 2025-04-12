<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Faculty;
use App\Application\Requests\Website\Faculty\AddRequestFaculty;
use App\Application\Requests\Website\Faculty\UpdateRequestFaculty;

class FacultyController extends AbstractController
{

     public function __construct(Faculty $model)
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
        return view('website.faculty.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.faculty.edit' , $id);
     }

     public function store(AddRequestFaculty $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('faculty');
     }

     public function update($id , UpdateRequestFaculty $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.faculty.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'faculty')->with('sucess' , 'Done Delete Faculty From system');
     }


}
