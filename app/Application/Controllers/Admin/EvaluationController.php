<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Evaluation\AddRequestEvaluation;
use App\Application\Requests\Admin\Evaluation\UpdateRequestEvaluation;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\EvaluationsDataTable;
use App\Application\Model\Evaluation;
use Yajra\Datatables\Request;
use Alert;

class EvaluationController extends AbstractController
{
    public function __construct(Evaluation $model)
    {
        parent::__construct($model);
    }

    public function index(EvaluationsDataTable $dataTable){
        return $dataTable->render('admin.evaluation.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.evaluation.edit' , $id);
    }

     public function store(AddRequestEvaluation $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/evaluation');
     }

     public function update($id , UpdateRequestEvaluation $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.evaluation.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/evaluation')->with('sucess' , 'Done Delete evaluation From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/evaluation')->with('sucess' , 'Done Delete evaluation From system');
    }

}
