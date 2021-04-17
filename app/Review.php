<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = "review";
    function book(){
        return $this->belongsTo('App\Book');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
