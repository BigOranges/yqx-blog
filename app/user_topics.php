<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_topics extends Model
{
    protected $fillable = ['user_id','topics_id'];
}
