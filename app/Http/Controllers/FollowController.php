<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FollowRepository;
use Auth;
use App\question;
use App\User;

class FollowController extends Controller
{
    protected $followRepository;
	public function __construct(FollowRepository $followRepository){
		
		$this->followRepository=$followRepository;
	}

	//关注问题
	public function store(Request $request){

		// return $request->get('question_id');

    	//点击关注问题，再次点击取消
    	$res = Auth::user()->followThis($request->get('question_id'));

    	$this->followRepository->follow_count($res,$request->get('question_id'));

    	return $res;
    }

    //关注用户
    public function folUser(Request $request){

    	$res = Auth::user()->followThis_user($request->get('followed_id'));

    	$this->followRepository->follow_user_count($res,$request->get('followed_id'));

    	return $res;

    }


    //检查当前用户是否关注问题
    public function checkQuestionFollow(Request $request){

    	if(Auth::check()){
    		return Auth::user()->followed($request->get('question_id'));
    	}else{
    		return 'false';
    	}
    }


    //检测当前用户是否关注用户
    public function checkUserFollow(Request $request){

    	// return $request->get('followed_id');

    	if(Auth::check()){
    		return Auth::user()->followed_user($request->get('followed_id'));
    	}else{
    		return 'false';
    	}
    }


    //文章点赞
    public function likeArticle(Request $request){

        $res = Auth::user()->articleFollowThis($request->get('article_id'));

        $this->followRepository->likearticle_count($res,$request->get('article_id'));

        return $res;
    }

    //文章收藏
    public function followArticle(Request $request){

         $res = Auth::user()->collect_article($request->get('article_id'));

          $this->followRepository->collect_count($res,$request->get('article_id'));

          return $res;

    }

    //关注话题
    public function followTopic(Request $request){
        
         $res = Auth::user()->follow_topics($request->get('topics_id'));
         
         $this->followRepository->topicFollows($res,$request->get('topics_id'));

         return $res;      
    }
}
