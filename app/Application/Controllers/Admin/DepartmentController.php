<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Department\AddRequestDepartment;
use App\Application\Requests\Admin\Department\UpdateRequestDepartment;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\DepartmentsDataTable;
use App\Application\Model\Department;
use Yajra\Datatables\Request;
use Alert;

class DepartmentController extends AbstractController
{
    public function __construct(Department $model)
    {
        parent::__construct($model);
    }

    public function index(DepartmentsDataTable $dataTable){
        return $dataTable->render('admin.department.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.department.edit' , $id);
    }

     public function store(AddRequestDepartment $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/department');
     }

     public function update($id , UpdateRequestDepartment $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.department.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/department')->with('sucess' , 'Done Delete department From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/department')->with('sucess' , 'Done Delete department From system');
    }

}
