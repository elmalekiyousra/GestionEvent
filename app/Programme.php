<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    public function event()
  {
  	return $this->belongsTo('App\Event');
  }
     protected $fillable=['id','description','id_event'];

}
