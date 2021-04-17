<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;

    protected $table = "author";
    function book(){
        return $this->belongsToMany('App\Book', 'book__authors', 'book_id', 'author_id');
    }
}
