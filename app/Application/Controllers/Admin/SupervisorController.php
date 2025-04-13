<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Supervisor\AddRequestSupervisor;
use App\Application\Requests\Admin\Supervisor\UpdateRequestSupervisor;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\SupervisorsDataTable;
use App\Application\Model\Supervisor;
use Yajra\Datatables\Request;
use Alert;

class SupervisorController extends AbstractController
{
    public function __construct(Supervisor $model)
    {
        parent::__construct($model);
    }

    public function index(SupervisorsDataTable $dataTable){
        return $dataTable->render('admin.supervisor.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.supervisor.edit' , $id);
    }

     public function store(AddRequestSupervisor $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/supervisor');
     }

     public function update($id , UpdateRequestSupervisor $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.supervisor.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/supervisor')->with('sucess' , 'Done Delete supervisor From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/supervisor')->with('sucess' , 'Done Delete supervisor From system');
    }

}
