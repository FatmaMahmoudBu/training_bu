<?php
 namespace App\Application\Model;
 use Illuminate\Database\Eloquent\Model;
 class Faculty extends Model
{
   public $table = "faculty";
   public function team(){
		return $this->hasMany(Team::class, "faculty_id");
		}
  public function department(){
  return $this->hasMany(Department::class, "faculty_id");
  }
     protected $fillable = [
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
