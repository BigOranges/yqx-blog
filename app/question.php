<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
     protected $fillable = ['title','body','user_id'];

    public function user(){

    	return $this->belongsTo('App\User');
    }


     public function topics(){

    	return $this->belongsToMany('App\topics');
    }


    public function answers(){

    	return $this->hasMany('App\Answer');
    }

     //一个问题多个评论
    public function comments(){

        return $this->morphMany('App\Comment','commentable');
    }

}
