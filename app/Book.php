<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    function authors(){
        return $this->belongsToMany('App\Author', 'book__authors', 'book_id', 'author_id');
    }

    function review(){
        return $this->hasMany('App\Review');
    }  

}
