<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveManagement extends Model
{
   protected $table = 'leave_management';
    protected $fillable=['leave_id','from_date','to_date','posting_date'];
    protected $primaryKey='id';
    public $timestamps=true;
}
