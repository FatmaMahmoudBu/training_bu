<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Supervisor_trainee extends Model
{

  public $table = "supervisor_trainee";


   protected $fillable = [
        'supervisor_id','trainee_id'
   ];


}
