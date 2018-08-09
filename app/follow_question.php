<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class follow_question extends Model
{	
	protected $table='user_question';
    protected $fillable = ['question_id','user_id'];
}
