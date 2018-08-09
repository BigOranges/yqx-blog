<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class topics extends Model
{
    protected $fillable = ['name','topic_pic','desc','questions_count'];

    public function questions(){

        return $this->belongsToMany('App\question');
   	}


   	public function users(){

   		return $this->belongsToMany('App\User');
   	}


   	public function articles(){

        return $this->belongsToMany('App\articles');
   	}
}
