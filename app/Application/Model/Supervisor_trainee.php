<?php
 namespace App\Application\Model;
 use Illuminate\Database\Eloquent\Model;
 class Supervisor_trainee extends Model
{
   public $table = "supervisor_trainee";
   public function supervisor(){
		return $this->belongsTo(Supervisor::class, "supervisor_id");
		}
   public function trainee(){
  return $this->belongsTo(Trainee::class, "trainee_id");
  }
     protected $fillable = [
     'supervisor_id',
   'trainee_id',
        'supervisor_id','trainee_id'
   ];
  }
