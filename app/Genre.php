<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //Table Name
    public $table = 'genres';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
