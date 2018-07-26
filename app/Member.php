<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    
    //Table Name
    public $table = 'members';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
