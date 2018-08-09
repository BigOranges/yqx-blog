<?php 

namespace App\Repositories;

use App\Answer;
use Illuminate\Http\Request;

	class AnswerRepository{

		public function create($attributes){

			return Answer::create($attributes);
		}
	}
 ?>