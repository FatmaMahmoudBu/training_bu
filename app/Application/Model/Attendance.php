<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

  public $table = "attendance";


   protected $fillable = [
        'trainee_id','supervisor_id','date','status','notes'
   ];

	public function getNotesLangAttribute(){
		return is_json($this->notes) && is_object(json_decode($this->notes)) ?  json_decode($this->notes)->{getCurrentLang()}  : $this->notes;
	}
	public function getNotesArAttribute(){
		return is_json($this->notes) && is_object(json_decode($this->notes)) ?  json_decode($this->notes)->ar  : $this->notes;
	}
	public function getNotesEnAttribute(){
		return is_json($this->notes) && is_object(json_decode($this->notes)) ?  json_decode($this->notes)->en  : $this->notes;
	}

}
