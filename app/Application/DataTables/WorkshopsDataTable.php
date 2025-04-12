<?php

namespace App\Application\DataTables;

use App\Application\Model\Workshop;
use Yajra\DataTables\Services\DataTable;use Datatables;use Illuminate\Http\JsonResponse;

class WorkshopsDataTable extends DataTable
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
              ->addColumn('id', 'admin.workshop.buttons.id')
             ->addColumn('edit', 'admin.workshop.buttons.edit')
             ->addColumn('delete', 'admin.workshop.buttons.delete')
             ->addColumn('view', 'admin.workshop.buttons.view')
             /*->addColumn('name', 'admin.workshop.buttons.langcol')*/
             ->rawColumns(['id','title', 'view', 'edit', 'delete'])
             ->make(true);
    }
    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Workshop::query();

        if(request()->has('from') && request()->get('from') != ''){
            $query = $query->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $query = $query->whereDate('created_at' , '<=' , request()->get('to'));
        }

		if(request()->has("title") && request()->get("title") != ""){
				$query = $query->where("title","like", "%".request()->get("title")."%");
		}

		if(request()->has("description") && request()->get("description") != ""){
				$query = $query->where("description","like", "%".request()->get("description")."%");
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
                'name' => 'title',
                'data' => 'title',
                'title' => trans("workshop.title"),
                'render' => 'function(){
                        return JSON.parse(this.title).'.getCurrentLang().';
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
        return 'Workshopdatatables_' . time();
    }
}