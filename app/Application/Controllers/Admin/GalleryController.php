<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Gallery\AddRequestGallery;
use App\Application\Requests\Admin\Gallery\UpdateRequestGallery;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\GallerysDataTable;
use App\Application\Model\Gallery;
use Yajra\Datatables\Request;
use Alert;

class GalleryController extends AbstractController
{
    public function __construct(Gallery $model)
    {
        parent::__construct($model);
    }

    public function index(GallerysDataTable $dataTable){
        return $dataTable->render('admin.gallery.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.gallery.edit' , $id);
    }

     public function store(AddRequestGallery $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/gallery');
     }

     public function update($id , UpdateRequestGallery $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.gallery.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/gallery')->with('sucess' , 'Done Delete gallery From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/gallery')->with('sucess' , 'Done Delete gallery From system');
    }

}
