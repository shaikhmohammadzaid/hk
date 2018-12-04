<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dtask_management extends Model
{
      protected $table = 'dtask_management';
    protected $fillable=['title','description','date','start_time','end_time','pm_id','status'];
    protected $primaryKey='task_id';
    public $timestamps=true;
}
