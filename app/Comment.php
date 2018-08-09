<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id','body','commentable_id','commentable_type'];

    //执行多态管联
    public function commentable(){//函数名必须和多态关联字段前缀一致

    	return $this->morphTo();
    }

    //定义一个comment 属于一个用户
    public function user(){

    	return $this->belongsTo('App\User','user_id');
    }

    
}
