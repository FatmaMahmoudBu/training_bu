<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\News\AddRequestNews;
use App\Application\Requests\Admin\News\UpdateRequestNews;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\NewssDataTable;
use App\Application\Model\News;
use Yajra\Datatables\Request;
use Alert;
use App\Application\Model\Gallery;

class NewsController extends AbstractController
{
    public function __construct(News $model)
    {
        parent::__construct($model);
    }

    public function index(NewssDataTable $dataTable){
        return $dataTable->render('admin.news.index');
    }

    public function show($id = null){
        $data = transformSelect(Gallery::pluck('name', 'id')->all());
        return $this->createOrEdit('admin.news.edit' , $id, ['galleries' => $data]);
    }

     public function store(AddRequestNews $request){
        
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/news');
     }

     public function update($id , UpdateRequestNews $request){
        //dd($request);
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.news.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/news')->with('sucess' , 'Done Delete news From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/news')->with('sucess' , 'Done Delete news From system');
    }

}
