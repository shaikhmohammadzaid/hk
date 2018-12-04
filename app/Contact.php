<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class Contact extends Model
{
    
	protected $table ="contacts";
	protected $fillable = ['user_email','user_message','shop_no'];

}
