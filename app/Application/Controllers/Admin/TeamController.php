<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Team\AddRequestTeam;
use App\Application\Requests\Admin\Team\UpdateRequestTeam;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\TeamsDataTable;
use App\Application\Model\Team;
use Yajra\Datatables\Request;
use Alert;
use App\Application\Model\Faculty;

class TeamController extends AbstractController
{
    public function __construct(Team $model)
    {
        parent::__construct($model);
    }

    public function index(TeamsDataTable $dataTable){
        return $dataTable->render('admin.team.index');
    }

    public function show($id = null){
        $data = transformSelect(Faculty::pluck('name', 'id')->all());
        return $this->createOrEdit('admin.team.edit' , $id, ['faculties' => $data]);
    }

     public function store(AddRequestTeam $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/team');
     }

     public function update($id , UpdateRequestTeam $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.team.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/team')->with('sucess' , 'Done Delete team From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/team')->with('sucess' , 'Done Delete team From system');
    }

}
