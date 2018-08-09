<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class follow_articles extends Model
{
    protected $table='follow_articles';
    protected $fillable = ['user_id','articles_id'];
}
