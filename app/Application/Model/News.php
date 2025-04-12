<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

  public $table = "news";


   protected $fillable = [
        'title','textbody','image','flag','author','date','gallery_id'
   ];
   public function getTitleLangAttribute()
   {
       return is_json($this->title) && is_object(json_decode($this->title)) ? json_decode($this->title)->{getCurrentLang()} : $this->title;
   }

   public function getTitleEnAttribute()
   {
       return is_json($this->title) && is_object(json_decode($this->title)) ? json_decode($this->title)->en : $this->title;
   }

   public function getTitleArAttribute()
   {
       return is_json($this->title) && is_object(json_decode($this->title)) ? json_decode($this->title)->ar : $this->title;
   }

   public function getAuthorLangAttribute()
   {
       return is_json($this->author) && is_object(json_decode($this->author)) ? json_decode($this->author)->{getCurrentLang()} : $this->author;
   }

   public function getAuthorEnAttribute()
   {
       return is_json($this->author) && is_object(json_decode($this->author)) ? json_decode($this->author)->en : $this->author;
   }

   public function getAuthorArAttribute()
   {
       return is_json($this->author) && is_object(json_decode($this->author)) ? json_decode($this->author)->ar : $this->author;
   }




   public function getTextbodyLangAttribute()
   {
       return is_json($this->textbody) && is_object(json_decode($this->textbody)) ? json_decode($this->textbody)->{getCurrentLang()} : $this->textbody;
   }

   public function getTextbodyEnAttribute()
   {
       return is_json($this->textbody) && is_object(json_decode($this->textbody)) ? json_decode($this->textbody)->en : $this->textbody;
   }

   public function getTextbodyArAttribute()
   {
       return is_json($this->textbody) && is_object(json_decode($this->textbody)) ? json_decode($this->textbody)->ar : $this->textbody;
   }

}
