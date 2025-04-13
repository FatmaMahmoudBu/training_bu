<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\School\AddRequestSchool;
use App\Application\Requests\Admin\School\UpdateRequestSchool;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\SchoolsDataTable;
use App\Application\Model\School;
use Yajra\Datatables\Request;
use Alert;

class SchoolController extends AbstractController
{
    public function __construct(School $model)
    {
        parent::__construct($model);
    }

    public function index(SchoolsDataTable $dataTable){
        return $dataTable->render('admin.school.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.school.edit' , $id);
    }

     public function store(AddRequestSchool $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/school');
     }

     public function update($id , UpdateRequestSchool $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.school.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/school')->with('sucess' , 'Done Delete school From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/school')->with('sucess' , 'Done Delete school From system');
    }

}
