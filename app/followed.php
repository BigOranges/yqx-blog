<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class followed extends Model
{
    public function users(){

  		 return $this->belongsToMany(self::class,'users')->withTimestamps();
  	}
}
