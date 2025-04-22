<?php
 namespace App\Application\Model;
 use Illuminate\Database\Eloquent\Model;
 class Administration extends Model
{
   public $table = "administration";
  public function school(){
		return $this->hasMany(School::class, "administration_id");
		}
     protected $fillable = [
        'name','address','image'
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
