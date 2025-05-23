<?php

namespace App\Application\DataTables;

use App\Application\Model\Attendance;
use Yajra\DataTables\Services\DataTable;use Datatables;use Illuminate\Http\JsonResponse;

class AttendancesDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax():JsonResponse
    {
        return
             Datatables::of($this->query())
              ->addColumn('id', 'admin.attendance.buttons.id')
             ->addColumn('edit', 'admin.attendance.buttons.edit')
             ->addColumn('delete', 'admin.attendance.buttons.delete')
             ->addColumn('view', 'admin.attendance.buttons.view')
             /*->addColumn('name', 'admin.attendance.buttons.langcol')*/
             ->rawColumns(['id','name', 'view', 'edit', 'delete'])
             ->make(true);
    }
    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Attendance::query();

        if(request()->has('from') && request()->get('from') != ''){
            $query = $query->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $query = $query->whereDate('created_at' , '<=' , request()->get('to'));
        }

		if(request()->has("trainee_id") && request()->get("trainee_id") != ""){
				$query = $query->where("trainee_id","=", request()->get("trainee_id"));
		}

		if(request()->has("supervisor_id") && request()->get("supervisor_id") != ""){
				$query = $query->where("supervisor_id","=", request()->get("supervisor_id"));
		}

		if(request()->has("date") && request()->get("date") != ""){
				$query = $query->where("date","=", request()->get("date"));
		}

		if(request()->has("status") && request()->get("status") != ""){
				$query = $query->where("status","=", request()->get("status"));
		}

		if(request()->has("notes") && request()->get("notes") != ""){
				$query = $query->where("notes","like", "%".request()->get("notes")."%");
		}



        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->parameters(dataTableConfig());
    }
    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
              [
                  'name' => "id",
                  'data' => 'id',
                  'title' => trans('curd.id'),
             ],
			[
                'name' => 'trainee_id',
                'data' => 'trainee_id',
                'title' => "trainee_id",
                
                ],
             [
                  'name' => 'view',
                  'data' => 'view',
                  'title' => trans('curd.view'),
                  'exportable' => false,
                  'printable' => false,
                  'searchable' => false,
                  'orderable' => false,
             ],
             [
                  'name' => 'edit',
                  'data' => 'edit',
                  'title' =>  trans('curd.edit'),
                  'exportable' => false,
                  'printable' => false,
                  'searchable' => false,
                  'orderable' => false,
             ],
             [
                   'name' => 'delete',
                   'data' => 'delete',
                   'title' => trans('curd.delete'),
                   'exportable' => false,
                   'printable' => false,
                   'searchable' => false,
                   'orderable' => false,
             ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Attendancedatatables_' . time();
    }
}