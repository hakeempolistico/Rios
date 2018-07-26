<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IssuedBook extends Model
{
    //Table Name
    public $table = 'issued_books';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
