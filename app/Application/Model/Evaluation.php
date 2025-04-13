<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{

  public $table = "evaluation";


   protected $fillable = [
        'trainee_id','supervisor_id','comments','score'
   ];

	public function getCommentsLangAttribute(){
		return is_json($this->comments) && is_object(json_decode($this->comments)) ?  json_decode($this->comments)->{getCurrentLang()}  : $this->comments;
	}
	public function getCommentsArAttribute(){
		return is_json($this->comments) && is_object(json_decode($this->comments)) ?  json_decode($this->comments)->ar  : $this->comments;
	}
	public function getCommentsEnAttribute(){
		return is_json($this->comments) && is_object(json_decode($this->comments)) ?  json_decode($this->comments)->en  : $this->comments;
	}

}
