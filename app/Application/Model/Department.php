<?php
 namespace App\Application\Model;
 use Illuminate\Database\Eloquent\Model;
 class Department extends Model
{
   public $table = "department";
   public function faculty(){
  return $this->belongsTo(Faculty::class, "faculty_id");
  }
     protected $fillable = [
   'faculty_id',
        'name'
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
 }
