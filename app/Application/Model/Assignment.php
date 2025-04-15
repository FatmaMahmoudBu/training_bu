<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{

  public $table = "assignment";


   protected $fillable = [
        'trainee_id','supervisor_id','report_path'
   ];


}
