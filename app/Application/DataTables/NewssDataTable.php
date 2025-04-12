<?php

namespace App\Application\DataTables;

use App\Application\Model\News;
use Yajra\DataTables\Services\DataTable;use Datatables;use Illuminate\Http\JsonResponse;

class NewssDataTable extends DataTable
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
              ->addColumn('id', 'admin.news.buttons.id')
             ->addColumn('edit', 'admin.news.buttons.edit')
             ->addColumn('delete', 'admin.news.buttons.delete')
             ->addColumn('view', 'admin.news.buttons.view')
             /*->addColumn('name', 'admin.news.buttons.langcol')*/
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
        $query = News::query();

        if(request()->has('from') && request()->get('from') != ''){
            $query = $query->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $query = $query->whereDate('created_at' , '<=' , request()->get('to'));
        }

		if(request()->has("title") && request()->get("title") != ""){
				$query = $query->where("title","=", request()->get("title"));
		}

		if(request()->has("textbody") && request()->get("textbody") != ""){
				$query = $query->where("textbody","=", request()->get("textbody"));
		}

    // if(request()->has("link") && request()->get("link") != ""){
		// 		$query = $query->where("link","=", request()->get("link"));
		// }
    if(request()->has("slug") && request()->get("slug") != ""){
        $query = $query->where("slug","=", request()->get("slug"));
    }
    if(request()->has("flag") && request()->get("flag") != ""){
        $query = $query->where("flag","=", request()->get("flag"));
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
                'title' =>trans('news.title'),
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
        return 'Newsdatatables_' . time();
    }
}
