<?php 

namespace App\Repositories;
use App\topics;
use App\follow_articles;
use Auth;
use Illuminate\Http\Request;

	class ArticleRepository{



			//处理提交的topics
   	 	public function deal($topics){

	        	return collect($topics)->map(function($topic){

	            //判断是否存在，存在id自增，
	            if(is_numeric($topic)){
	                //让标签的articles_count字段自增
	                topics::findOrFail($topic)->increment('articles_count');
	                return $topic;
	            }

	        })->toArray();
   	 	}


   	 	public function follow($article_id){

   	 		follow_articles::create([
   	 			'user_id'=>Auth::id(),
   	 			'articles_id'=>$article_id
   	 		]);
   	 	}

	}
	
 ?>