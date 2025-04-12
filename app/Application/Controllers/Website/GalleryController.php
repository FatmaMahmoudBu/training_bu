<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Gallery;
use App\Application\Requests\Website\Gallery\AddRequestGallery;
use App\Application\Requests\Website\Gallery\UpdateRequestGallery;

class GalleryController extends AbstractController
{

     public function __construct(Gallery $model)
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
        return view('website.gallery.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.gallery.edit' , $id);
     }

     public function store(AddRequestGallery $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('gallery');
     }

     public function update($id , UpdateRequestGallery $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.gallery.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'gallery')->with('sucess' , 'Done Delete Gallery From system');
     }


}
