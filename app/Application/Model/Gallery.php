<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{

  public $table = "gallery";


   protected $fillable = [
        'name'
   ];

	public function getNameLangAttribute(){
		return is_json($this->name) && is_object(json_decode($this->name)) ?  json_decode($this->name)->{getCurrentLang()}  : $this->name;
	}
	public function getNameArAttribute(){
		return is_json($this->name) && is_object(json_decode($this->name)) ?  json_decode($this->name)->ar  : $this->name;
	}

}
