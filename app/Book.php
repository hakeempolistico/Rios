<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //Table Name
    public $table = 'books';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
