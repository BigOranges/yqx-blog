<?php 


namespace App\Repositories;

use App\question;
use App\Answer;
use App\topics;
use Auth;
use App\User;
use App\articles;
use Illuminate\Http\Request;
use App\Notifications\UserFollowNotification;
class FollowRepository{

	public function follow_count($res,$question_id){

		if(count($res['attached'])>0){
    		//关注
    		question::findOrFail($question_id)->increment('followers_count');
    	}else{
    		//取消关注
    		question::findOrFail($question_id)->decrement('followers_count');
    	}
	}


    public function follow_user_count($res,$toUser_id){

        

        if(count($res['attached'])>0){

            $toUser = User::findOrFail($toUser_id);

            //关联模型
            $toUser->notify(new UserFollowNotification());
            //关注
            Auth::user()->increment('followers_count');
            User::findOrFail($toUser_id)->increment('followings_count');
        }else{

            //取消关注
            Auth::user()->decrement('followers_count');
            User::findOrFail($toUser_id)->decrement('followings_count');
        }

    }

    //关注话题
	public function follow_topic($res,$topic_id){

		if(count($res['attached'])>0){
    		//关注
    		topics::findOrFail($topic_id)->increment('followers_count');
    	}else{
    		//取消关注
    		topics::findOrFail($topic_id)->decrement('followers_count');
    	}
	}


    //点赞文章
    public function likearticle_count($res,$article_id){

        if(count($res['attached'])>0){
            //关注
            articles::findOrFail($article_id)->increment('likes_count');
        }else{
            //取消关注
            articles::findOrFail($article_id)->decrement('likes_count');
        }
    }

    //收藏文章
    public function collect_count($res,$article_id){

        if(count($res['attached'])>0){
            //关注
            articles::findOrFail($article_id)->increment('followers_count');
        }else{
            //取消关注
            articles::findOrFail($article_id)->decrement('followers_count');
        }
    }

    //关注topic
    public function topicFollows($res,$topic_id){

        if(count($res['attached'])>0){
            //关注
            topics::findOrFail($topic_id)->increment('followers_count');
        }else{
            //取消关注
            topics::findOrFail($topic_id)->decrement('followers_count');
        }
    }			
}


?>