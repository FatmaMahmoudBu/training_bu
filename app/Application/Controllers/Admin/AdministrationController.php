<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Administration\AddRequestAdministration;
use App\Application\Requests\Admin\Administration\UpdateRequestAdministration;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\AdministrationsDataTable;
use App\Application\Model\Administration;
use Yajra\Datatables\Request;
use Alert;

class AdministrationController extends AbstractController
{
    public function __construct(Administration $model)
    {
        parent::__construct($model);
    }

    public function index(AdministrationsDataTable $dataTable){
        return $dataTable->render('admin.administration.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.administration.edit' , $id);
    }

     public function store(AddRequestAdministration $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/administration');
     }

     public function update($id , UpdateRequestAdministration $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.administration.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/administration')->with('sucess' , 'Done Delete administration From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/administration')->with('sucess' , 'Done Delete administration From system');
    }

}
