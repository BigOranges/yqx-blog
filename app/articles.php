<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class articles extends Model
{
    
    protected $fillable = ['title','body','bg_img','user_id'];


    public function user(){

    	return $this->belongsTo('App\User');
    }



     public function topics(){

    	return $this->belongsToMany('App\topics');
    }


     //一个文章多个评论
    public function comments(){

        return $this->morphMany('App\Comment','commentable');
    }
}
