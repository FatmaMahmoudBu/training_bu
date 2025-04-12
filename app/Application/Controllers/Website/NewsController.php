<?php

namespace App\Application\Controllers\Website;

use App\Application\Requests\Website\News\AddRequestNews;
use App\Application\Requests\Website\News\UpdateRequestNews;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\NewssDataTable;
use App\Application\Model\News;
use Yajra\Datatables\Request;
use Alert;

class NewsController extends AbstractController
{
    public function __construct(News $model)
    {
        parent::__construct($model);
    }

    public function index(NewssDataTable $dataTable){
        
        $items = $this->model;

        if(request()->has('from') && request()->get('from') != ''){
            $items = $items->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $items = $items->whereDate('created_at' , '<=' , request()->get('to'));
        }

			if(request()->has("name") && request()->get("name") != ""){
				$items = $items->where("name","like", "%".request()->get("name")."%");
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.news.index' , compact('items'));
        
        //return $dataTable->render('website.news.index');
    }

    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('website.news.show' , $id , ['fields' =>  $fields]);
    }

public function show_news(){
    //dd("entered");
        return $this->createOrEdit('website.news.show_news');
    }

}
