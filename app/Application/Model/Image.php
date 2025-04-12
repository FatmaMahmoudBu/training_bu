<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

  public $table = "image";


   protected $fillable = [
        'title','description','image','gallery_id'
   ];

	public function getTitleLangAttribute(){
		return is_json($this->title) && is_object(json_decode($this->title)) ?  json_decode($this->title)->{getCurrentLang()}  : $this->title;
	}
	public function getTitleArAttribute(){
		return is_json($this->title) && is_object(json_decode($this->title)) ?  json_decode($this->title)->ar  : $this->title;
	}
	public function getDescriptionLangAttribute(){
		return is_json($this->description) && is_object(json_decode($this->description)) ?  json_decode($this->description)->{getCurrentLang()}  : $this->description;
	}
	public function getDescriptionArAttribute(){
		return is_json($this->description) && is_object(json_decode($this->description)) ?  json_decode($this->description)->ar  : $this->description;
	}

}
