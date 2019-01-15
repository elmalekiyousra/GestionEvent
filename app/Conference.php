<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    public function event()
       {
  	        return $this->belongsTo('App\Event');
        }
     protected $fillable=['id','nom','type','date','description','id_event'];

}
