<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mechanic extends Model
{
    public $timestamps = false;
    protected $table='mechanicshops';
    protected $fillable = ['image_id','shop_name','phone_number','address','pin_code','city','state','service_id','time_id','latitude','longitude'];
    protected $primaryKey = 'id';

}
