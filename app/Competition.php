<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    public function event()
       {
  	        return $this->belongsTo('App\Event');
        }
     protected $fillable=['id','id_event','type','date','description'];

}
