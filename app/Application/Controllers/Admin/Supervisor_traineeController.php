<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Supervisor_trainee\AddRequestSupervisor_trainee;
use App\Application\Requests\Admin\Supervisor_trainee\UpdateRequestSupervisor_trainee;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\Supervisor_traineesDataTable;
use App\Application\Model\Supervisor_trainee;
use Yajra\Datatables\Request;
use Alert;

class Supervisor_traineeController extends AbstractController
{
    public function __construct(Supervisor_trainee $model)
    {
        parent::__construct($model);
    }

    public function index(Supervisor_traineesDataTable $dataTable){
        return $dataTable->render('admin.supervisor_trainee.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.supervisor_trainee.edit' , $id);
    }

     public function store(AddRequestSupervisor_trainee $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/supervisor_trainee');
     }

     public function update($id , UpdateRequestSupervisor_trainee $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.supervisor_trainee.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/supervisor_trainee')->with('sucess' , 'Done Delete supervisor_trainee From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/supervisor_trainee')->with('sucess' , 'Done Delete supervisor_trainee From system');
    }

}
