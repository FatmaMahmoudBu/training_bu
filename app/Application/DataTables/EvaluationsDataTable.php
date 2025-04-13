<?php

namespace App\Application\DataTables;

use App\Application\Model\Evaluation;
use Yajra\DataTables\Services\DataTable;use Datatables;use Illuminate\Http\JsonResponse;

class EvaluationsDataTable extends DataTable
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
              ->addColumn('id', 'admin.evaluation.buttons.id')
             ->addColumn('edit', 'admin.evaluation.buttons.edit')
             ->addColumn('delete', 'admin.evaluation.buttons.delete')
             ->addColumn('view', 'admin.evaluation.buttons.view')
             /*->addColumn('name', 'admin.evaluation.buttons.langcol')*/
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
        $query = Evaluation::query();

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

		if(request()->has("comments") && request()->get("comments") != ""){
				$query = $query->where("comments","like", "%".request()->get("comments")."%");
		}

		if(request()->has("score") && request()->get("score") != ""){
				$query = $query->where("score","=", request()->get("score"));
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
        return 'Evaluationdatatables_' . time();
    }
}