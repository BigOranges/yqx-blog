<?php 

namespace App\Repositories;

use App\Question;
use App\topics;
use App\follow_question;
use Auth;
use Illuminate\Http\Request;

	class QuestionRepository{


		// public function ceshi($request){

		// 	return $request;
		// }

		public function create(array $attributes){

			return Question::create($attributes);
		}

		//处理提交的topics
   	 	public function deal($topics){

	        	return collect($topics)->map(function($topic){

	            //判断是否存在，存在id自增，不存在添加并返回id
	            if(is_numeric($topic)){
	                //让标签的questions_count字段自增
	                topics::findOrFail($topic)->increment('questions_count');
	                return $topic;
	            }else{

	                //添加到topics表
	                $topic = topics::create(['name'=>$topic,'questions_count'=>1,'desc'=>'','topic_pic'=>'']);
	                return $topic->id;	
	            }

	        })->toArray();
   	 	}


   	 	public function follow($question_id){

   	 		follow_question::create([
   	 			'user_id'=>Auth::id(),
   	 			'question_id'=>$question_id
   	 		]);
   	 	}



	}
 ?>