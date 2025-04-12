<?php
 namespace App\Application\Model;
 use Illuminate\Database\Eloquent\Model;
 class Team extends Model
{
   public $table = "team";
   public function faculty(){
		return $this->belongsTo(Faculty::class, "faculty_id");
		}
     protected $fillable = [
   'faculty_id',
        'name','position','type','image','faculty_id'
   ];
  public function getNameLangAttribute(){
  return is_json($this->name) && is_object(json_decode($this->name)) ?  json_decode($this->name)->{getCurrentLang()}  : $this->name;
 }
 public function getNameEnAttribute(){
  return is_json($this->name) && is_object(json_decode($this->name)) ?  json_decode($this->name)->en  : $this->name;
 }
 public function getNameArAttribute(){
  return is_json($this->name) && is_object(json_decode($this->name)) ?  json_decode($this->name)->ar  : $this->name;
 }
 public function getPositionLangAttribute(){
  return is_json($this->position) && is_object(json_decode($this->position)) ?  json_decode($this->position)->{getCurrentLang()}  : $this->position;
 }
 public function getPositionEnAttribute(){
  return is_json($this->position) && is_object(json_decode($this->position)) ?  json_decode($this->position)->en  : $this->position;
 }
 public function getPositionArAttribute(){
  return is_json($this->position) && is_object(json_decode($this->position)) ?  json_decode($this->position)->ar  : $this->position;
 }
 public function getTypeLangAttribute(){
  return is_json($this->type) && is_object(json_decode($this->type)) ?  json_decode($this->type)->{getCurrentLang()}  : $this->type;
 }
 public function getTypeEnAttribute(){
  return is_json($this->type) && is_object(json_decode($this->type)) ?  json_decode($this->type)->en  : $this->type;
 }
 public function getTypeArAttribute(){
  return is_json($this->type) && is_object(json_decode($this->type)) ?  json_decode($this->type)->ar  : $this->type;
 }
 }
