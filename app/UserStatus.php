<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    protected $table = "user_status";
    function users(){
        return $this->hasMany('App\User');
    }
}
