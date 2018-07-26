<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //Table Name
    public $table = 'sections';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
