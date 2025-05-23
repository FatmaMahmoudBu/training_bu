<?php

namespace App\Application\DataTables;

use App\Application\Model\Page;
use Yajra\DataTables\Services\DataTable;use Datatables;use Illuminate\Http\JsonResponse;

class PagesDataTable extends DataTable
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
            ->addColumn('id', 'admin.page.buttons.id')
            ->addColumn('edit', 'admin.page.buttons.edit')
            ->addColumn('delete', 'admin.page.buttons.delete')
            ->addColumn('view', 'admin.page.buttons.view')
            ->addColumn('name', 'admin.page.buttons.langcol')
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
        $query = Page::query();

        if(request()->has('from') && request()->get('from') != ''){
            $query = $query->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $query = $query->whereDate('created_at' , '<=' , request()->get('to'));
        }

        if(request()->has('title') && request()->get('title') != ''){
            $query = $query->where('title' , 'like' ,"%".request()->get('title')."%");
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
       $html = $this->builder()
         ->columns($this->getColumns())
         ->parameters(dataTableConfig());
     if (getCurrentLang() == 'ar') {
         $html = $html->parameters([
             'language' => [
                 'url' => url('/vendor/datatables/arabic.json')
             ]
         ]);
     }
     return $html;
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
                'title' => trans("page.title"),
                'render' => 'function(){
                        return JSON.parse(this.title).' . getCurrentLang() . ';
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
                'title' => trans('curd.edit'),
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
        return 'Pagedatatables_' . time();
    }
}
