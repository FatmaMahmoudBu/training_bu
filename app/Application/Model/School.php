<?php
 namespace App\Application\Model;
 use Illuminate\Database\Eloquent\Model;
 class School extends Model
{
   public $table = "school";
   public function supervisor(){
		return $this->hasMany(Supervisor::class, "school_id");
		}
   public function trainee(){
  return $this->hasMany(Trainee::class, "school_id");
  }
   public function administration(){
  return $this->belongsTo(Administration::class, "administration_id");
  }
     protected $fillable = [
   'administration_id',
        'name','address','administration_id'
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
 public function getAddressLangAttribute(){
  return is_json($this->address) && is_object(json_decode($this->address)) ?  json_decode($this->address)->{getCurrentLang()}  : $this->address;
 }
 public function getAddressArAttribute(){
  return is_json($this->address) && is_object(json_decode($this->address)) ?  json_decode($this->address)->ar  : $this->address;
 }
 public function getAddressEnAttribute(){
  return is_json($this->address) && is_object(json_decode($this->address)) ?  json_decode($this->address)->en  : $this->address;
 }
 }
