<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Workshop\AddRequestWorkshop;
use App\Application\Requests\Admin\Workshop\UpdateRequestWorkshop;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\WorkshopsDataTable;
use App\Application\Model\Workshop;
use Yajra\Datatables\Request;
use Alert;

class WorkshopController extends AbstractController
{
    public function __construct(Workshop $model)
    {
        parent::__construct($model);
    }

    public function index(WorkshopsDataTable $dataTable){
        return $dataTable->render('admin.workshop.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.workshop.edit' , $id);
    }

     public function store(AddRequestWorkshop $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/workshop');
     }

     public function update($id , UpdateRequestWorkshop $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.workshop.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/workshop')->with('sucess' , 'Done Delete workshop From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/workshop')->with('sucess' , 'Done Delete workshop From system');
    }

}
