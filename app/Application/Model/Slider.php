<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{

  public $table = "slider";


   protected $fillable = [
        'image','title','text','date','body','gallery','video','status','presentation'
   ];

	public function getTitleLangAttribute(){
		return is_json($this->title) && is_object(json_decode($this->title)) ?  json_decode($this->title)->{getCurrentLang()}  : $this->title;
	}
	public function getTitleEnAttribute(){
		return is_json($this->title) && is_object(json_decode($this->title)) ?  json_decode($this->title)->en  : $this->title;
	}
	public function getTitleArAttribute(){
		return is_json($this->title) && is_object(json_decode($this->title)) ?  json_decode($this->title)->ar  : $this->title;
	}
	public function getTextLangAttribute(){
		return is_json($this->text) && is_object(json_decode($this->text)) ?  json_decode($this->text)->{getCurrentLang()}  : $this->text;
	}
	public function getTextEnAttribute(){
		return is_json($this->text) && is_object(json_decode($this->text)) ?  json_decode($this->text)->en  : $this->text;
	}
	public function getTextArAttribute(){
		return is_json($this->text) && is_object(json_decode($this->text)) ?  json_decode($this->text)->ar  : $this->text;
	}
	public function getBodyLangAttribute(){
		return is_json($this->body) && is_object(json_decode($this->body)) ?  json_decode($this->body)->{getCurrentLang()}  : $this->body;
	}
	public function getBodyEnAttribute(){
		return is_json($this->body) && is_object(json_decode($this->body)) ?  json_decode($this->body)->en  : $this->body;
	}
	public function getBodyArAttribute(){
		return is_json($this->body) && is_object(json_decode($this->body)) ?  json_decode($this->body)->ar  : $this->body;
	}
	public function getGalleryLangAttribute(){
		return is_json($this->gallery) && is_object(json_decode($this->gallery)) ?  json_decode($this->gallery)->{getCurrentLang()}  : $this->gallery;
	}
	public function getGalleryEnAttribute(){
		return is_json($this->gallery) && is_object(json_decode($this->gallery)) ?  json_decode($this->gallery)->en  : $this->gallery;
	}
	public function getGalleryArAttribute(){
		return is_json($this->gallery) && is_object(json_decode($this->gallery)) ?  json_decode($this->gallery)->ar  : $this->gallery;
	}
	public function getStatusLangAttribute(){
		return is_json($this->status) && is_object(json_decode($this->status)) ?  json_decode($this->status)->{getCurrentLang()}  : $this->status;
	}
	public function getStatusEnAttribute(){
		return is_json($this->status) && is_object(json_decode($this->status)) ?  json_decode($this->status)->en  : $this->status;
	}
	public function getStatusArAttribute(){
		return is_json($this->status) && is_object(json_decode($this->status)) ?  json_decode($this->status)->ar  : $this->status;
	}
	public function getPresentationLangAttribute(){
		return is_json($this->presentation) && is_object(json_decode($this->presentation)) ?  json_decode($this->presentation)->{getCurrentLang()}  : $this->presentation;
	}
	public function getPresentationEnAttribute(){
		return is_json($this->presentation) && is_object(json_decode($this->presentation)) ?  json_decode($this->presentation)->en  : $this->presentation;
	}
	public function getPresentationArAttribute(){
		return is_json($this->presentation) && is_object(json_decode($this->presentation)) ?  json_decode($this->presentation)->ar  : $this->presentation;
	}

}
