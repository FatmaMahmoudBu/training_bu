<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Image;
use App\Application\Requests\Website\Image\AddRequestImage;
use App\Application\Requests\Website\Image\UpdateRequestImage;

class ImageController extends AbstractController
{

     public function __construct(Image $model)
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

			if(request()->has("gallery_id") && request()->get("gallery_id") != ""){
				$items = $items->where("gallery_id","=", request()->get("gallery_id"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.image.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.image.edit' , $id);
     }

     public function store(AddRequestImage $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('image');
     }

     public function update($id , UpdateRequestImage $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.image.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'image')->with('sucess' , 'Done Delete Image From system');
     }


}
