<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Team;
use App\Application\Requests\Website\Team\AddRequestTeam;
use App\Application\Requests\Website\Team\UpdateRequestTeam;

class TeamController extends AbstractController
{

     public function __construct(Team $model)
     {
        parent::__construct($model);
     }

     public function index(){
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

			if(request()->has("position") && request()->get("position") != ""){
				$items = $items->where("position","like", "%".request()->get("position")."%");
			}

			if(request()->has("type") && request()->get("type") != ""){
				$items = $items->where("type","like", "%".request()->get("type")."%");
			}

			if(request()->has("faculty_id") && request()->get("faculty_id") != ""){
				$items = $items->where("faculty_id","=", request()->get("faculty_id"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.team.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.team.edit' , $id);
     }

     public function store(AddRequestTeam $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('team');
     }

     public function update($id , UpdateRequestTeam $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.team.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'team')->with('sucess' , 'Done Delete Team From system');
     }


}
