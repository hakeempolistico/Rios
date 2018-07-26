<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //Table Name
    public $table = 'authors';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
