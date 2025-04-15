<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Assignment\AddRequestAssignment;
use App\Application\Requests\Admin\Assignment\UpdateRequestAssignment;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\AssignmentsDataTable;
use App\Application\Model\Assignment;
use Yajra\Datatables\Request;
use Alert;

class AssignmentController extends AbstractController
{
    public function __construct(Assignment $model)
    {
        parent::__construct($model);
    }

    public function index(AssignmentsDataTable $dataTable){
        return $dataTable->render('admin.assignment.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.assignment.edit' , $id);
    }

     public function store(AddRequestAssignment $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/assignment');
     }

     public function update($id , UpdateRequestAssignment $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.assignment.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/assignment')->with('sucess' , 'Done Delete assignment From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/assignment')->with('sucess' , 'Done Delete assignment From system');
    }

}
