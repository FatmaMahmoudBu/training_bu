<?php

namespace App\Application\DataTables;

use App\Application\Model\Supervisor;
use Yajra\DataTables\Services\DataTable;use Datatables;use Illuminate\Http\JsonResponse;

class SupervisorsDataTable extends DataTable
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
              ->addColumn('id', 'admin.supervisor.buttons.id')
             ->addColumn('edit', 'admin.supervisor.buttons.edit')
             ->addColumn('delete', 'admin.supervisor.buttons.delete')
             ->addColumn('view', 'admin.supervisor.buttons.view')
             /*->addColumn('name', 'admin.supervisor.buttons.langcol')*/
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
        $query = Supervisor::query();

        if(request()->has('from') && request()->get('from') != ''){
            $query = $query->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $query = $query->whereDate('created_at' , '<=' , request()->get('to'));
        }

		if(request()->has("name") && request()->get("name") != ""){
				$query = $query->where("name","like", "%".request()->get("name")."%");
		}

		if(request()->has("email") && request()->get("email") != ""){
				$query = $query->where("email","=", request()->get("email"));
		}

		if(request()->has("phone") && request()->get("phone") != ""){
				$query = $query->where("phone","=", request()->get("phone"));
		}

		if(request()->has("school_id") && request()->get("school_id") != ""){
				$query = $query->where("school_id","=", request()->get("school_id"));
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
                'name' => 'name',
                'data' => 'name',
                'title' => trans("supervisor.name"),
                'render' => 'function(){
                        return JSON.parse(this.name).'.getCurrentLang().';
                    }',
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
        return 'Supervisordatatables_' . time();
    }
}