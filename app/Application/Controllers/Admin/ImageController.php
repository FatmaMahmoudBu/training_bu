<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Image\AddRequestImage;
use App\Application\Requests\Admin\Image\UpdateRequestImage;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\ImagesDataTable;
use App\Application\Model\Image;
use Yajra\Datatables\Request;
use Alert;
use App\Application\Model\Gallery;

class ImageController extends AbstractController
{
    public function __construct(Image $model)
    {
        parent::__construct($model);
    }

    public function index(ImagesDataTable $dataTable){
        return $dataTable->render('admin.image.index');
    }

    public function show($id = null){
        $data = transformSelect(Gallery::pluck('name', 'id')->all());
        return $this->createOrEdit('admin.image.edit' , $id, ['galleries' => $data]);
    }

     public function store(AddRequestImage $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/image');
     }

     public function update($id , UpdateRequestImage $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.image.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/image')->with('sucess' , 'Done Delete image From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/image')->with('sucess' , 'Done Delete image From system');
    }

}
