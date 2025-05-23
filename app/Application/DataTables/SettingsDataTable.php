<?php

namespace App\Application\DataTables;

use App\Application\Model\Setting;
use Yajra\DataTables\Services\DataTable;use Datatables;use Illuminate\Http\JsonResponse;

class SettingsDataTable extends DataTable
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
            ->addColumn('id', 'admin.setting.buttons.id')
            ->addColumn('edit', 'admin.setting.buttons.edit')
            ->addColumn('delete', 'admin.setting.buttons.delete')
            ->addColumn('view', 'admin.setting.buttons.view')
            /*->addColumn('name', 'admin.team.buttons.langcol')*/
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
        $query = Setting::query();

        if(request()->has('from') && request()->get('from') != ''){
            $query = $query->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $query = $query->whereDate('created_at' , '<=' , request()->get('to'));
        }

        if(request()->has('name') && request()->get('name') != ''){
            $query = $query->where('name' , request()->get('name'));
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
        $array = [
            [
                'name' => "id",
                'data' => 'id',
                'title' => trans('curd.id'),
            ],
            [
                'name' => "name",
                'data' => 'name',
                'title' => trans('setting.name'),
            ],
            [
                'name' => "view",
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
            ]
        ];
        // if (env('APP_ENV') == 'local') {
        //     array_push($array, [
        //         'name' => 'delete',
        //         'data' => 'delete',
        //         'title' => trans('curd.delete'),
        //         'exportable' => false,
        //         'printable' => false,
        //         'searchable' => false,
        //         'orderable' => false,
        //     ]);
        // }
        return $array;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Settingdatatables_' . time();
    }
}