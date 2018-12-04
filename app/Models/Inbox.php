<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Inbox extends Model
{
    public $table = 'admin_messages';
    
    protected $guard = 'admin';
    
}
