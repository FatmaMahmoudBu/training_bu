<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{

  public $table = "supervisor";


   protected $fillable = [
        'name','email','phone','school_id'
   ];

	public function getNameLangAttribute(){
		return is_json($this->name) && is_object(json_decode($this->name)) ?  json_decode($this->name)->{getCurrentLang()}  : $this->name;
	}
	public function getNameArAttribute(){
		return is_json($this->name) && is_object(json_decode($this->name)) ?  json_decode($this->name)->ar  : $this->name;
	}
	public function getNameEnAttribute(){
		return is_json($this->name) && is_object(json_decode($this->name)) ?  json_decode($this->name)->en  : $this->name;
	}

}
