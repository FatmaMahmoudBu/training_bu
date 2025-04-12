<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Faculty\AddRequestFaculty;
use App\Application\Requests\Admin\Faculty\UpdateRequestFaculty;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\FacultysDataTable;
use App\Application\Model\Faculty;
use Yajra\Datatables\Request;
use Alert;

class FacultyController extends AbstractController
{
    public function __construct(Faculty $model)
    {
        parent::__construct($model);
    }

    public function index(FacultysDataTable $dataTable){
        return $dataTable->render('admin.faculty.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.faculty.edit' , $id);
    }

     public function store(AddRequestFaculty $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/faculty');
     }

     public function update($id , UpdateRequestFaculty $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.faculty.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/faculty')->with('sucess' , 'Done Delete faculty From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/faculty')->with('sucess' , 'Done Delete faculty From system');
    }

}
