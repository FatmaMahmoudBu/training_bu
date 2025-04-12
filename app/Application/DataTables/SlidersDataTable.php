<?php

namespace App\Application\DataTables;

use App\Application\Model\Slider;
use Yajra\DataTables\Services\DataTable;use Datatables;use Illuminate\Http\JsonResponse;

class SlidersDataTable extends DataTable
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
              ->addColumn('id', 'admin.slider.buttons.id')
             ->addColumn('edit', 'admin.slider.buttons.edit')
             ->addColumn('delete', 'admin.slider.buttons.delete')
             ->addColumn('view', 'admin.slider.buttons.view')
             /*->addColumn('name', 'admin.slider.buttons.langcol')*/
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
        $query = Slider::query();

        if(request()->has('from') && request()->get('from') != ''){
            $query = $query->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $query = $query->whereDate('created_at' , '<=' , request()->get('to'));
        }

		if(request()->has("title") && request()->get("title") != ""){
				$query = $query->where("title","like", "%".request()->get("title")."%");
		}

		if(request()->has("text") && request()->get("text") != ""){
				$query = $query->where("text","like", "%".request()->get("text")."%");
		}

		if(request()->has("date") && request()->get("date") != ""){
				$query = $query->where("date","=", request()->get("date"));
		}

		if(request()->has("gallery") && request()->get("gallery") != ""){
				$query = $query->where("gallery","like", "%".request()->get("gallery")."%");
		}

		if(request()->has("video") && request()->get("video") != ""){
				$query = $query->where("video","=", request()->get("video"));
		}

		if(request()->has("status") && request()->get("status") != ""){
				$query = $query->where("status","like", "%".request()->get("status")."%");
		}

		if(request()->has("presentation") && request()->get("presentation") != ""){
				$query = $query->where("presentation","like", "%".request()->get("presentation")."%");
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
			// [
            //     'name' => 'image',
            //     'data' => 'image',
            //     'title' => "image",
            //     'render' => 'function( ){
            //                            return \'<img src="http://iro-10mar.test/files/small/\'+JSON.parse(this.image)+\'" /> \';
            //                         }',
            //     ],
            [
                'name' => 'title',
                'data' => 'title',
                'title' =>trans('slider.title'),
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
        return 'Sliderdatatables_' . time();
    }
}