<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Message extends Model
{
    public $table = 'messages';
    
    protected $guard = 'admin';
    
}
