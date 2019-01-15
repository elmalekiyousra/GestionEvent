<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function conference()
  {
  	return $this->hasOne('App\Conference');
  }
      public function soiree()
  {
  	return $this->hasOne('App\Soiree');
  }

    public function competition()
  {
  	return $this->hasOne('App\Competition');
  }

     public function programme()
  {
    return $this->hasOne('App\Programme');
  }
     protected $fillable=['id','nom','date','lieu','description'];
      
    
}
