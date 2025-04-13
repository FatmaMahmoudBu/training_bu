<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Trainee\AddRequestTrainee;
use App\Application\Requests\Admin\Trainee\UpdateRequestTrainee;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\TraineesDataTable;
use App\Application\Model\Trainee;
use Yajra\Datatables\Request;
use Alert;

class TraineeController extends AbstractController
{
    public function __construct(Trainee $model)
    {
        parent::__construct($model);
    }

    public function index(TraineesDataTable $dataTable){
        return $dataTable->render('admin.trainee.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.trainee.edit' , $id);
    }

     public function store(AddRequestTrainee $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/trainee');
     }

     public function update($id , UpdateRequestTrainee $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.trainee.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/trainee')->with('sucess' , 'Done Delete trainee From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/trainee')->with('sucess' , 'Done Delete trainee From system');
    }

}
