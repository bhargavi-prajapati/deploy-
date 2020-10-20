<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    public $timestamps = false;
    protected $table ='images';
    protected $fillable =['img_1','img_2'];
}
