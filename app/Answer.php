<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['user_id','question_id','body'];

    public function user(){

    	return $this->belongsTo('App\User');
    }

    public function question(){

    	return $this->belongsTo('App\Question');
    }


    //一个答案能有多个评论
    public function comments(){

        return $this->morphMany('App\Comment','commentable');
    }

    //截取创建时间
    public function create_time($str){
    	return date('Y-m-d',strtotime($str));
    }


}
