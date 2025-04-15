<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Attendance\AddRequestAttendance;
use App\Application\Requests\Admin\Attendance\UpdateRequestAttendance;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\AttendancesDataTable;
use App\Application\Model\Attendance;
use Yajra\Datatables\Request;
use Alert;

class AttendanceController extends AbstractController
{
    public function __construct(Attendance $model)
    {
        parent::__construct($model);
    }

    public function index(AttendancesDataTable $dataTable){
        return $dataTable->render('admin.attendance.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.attendance.edit' , $id);
    }

     public function store(AddRequestAttendance $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/attendance');
     }

     public function update($id , UpdateRequestAttendance $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.attendance.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/attendance')->with('sucess' , 'Done Delete attendance From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/attendance')->with('sucess' , 'Done Delete attendance From system');
    }

}
