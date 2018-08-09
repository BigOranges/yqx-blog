<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Answer;
use App\question;
use App\articles;

class CommentController extends Controller
{

    //问题评论创建
     public function store(Request $request){


    	$question = question::findOrFail($request->get('commentable_id'));
    	
        $question_comment = $question->comments()->create(['user_id'=>Auth::id(),'body'=>$request->get('body')]);

        $question_comment->name = Auth::user()->name;
        $question_comment->avatar = Auth::user()->avatar;

        $question->increment('comments_count');
        return $question_comment;
    	
    }


    //答案评论创建
    public function create(Request $request){
    
    	$answer = Answer::findOrFail($request->get('commentable_id'));

    	$answer_comment = $answer->comments()->create(['user_id'=>Auth::id(),'body'=>$request->get('body')]);

        $answer_comment->name = Auth::user()->name;
    	$answer_comment->avatar = Auth::user()->avatar;
        $answer_comment->createTime = date('Y-m-d',strtotime($answer_comment->created_at)); 

        $answer->increment('comments_count');

        return $answer_comment;

    }

    //文章評論創建
    public function createArticle(Request $request){

        $article = articles::findOrFail($request->get('commentable_id'));

        $article_comment = $article->comments()->create(['user_id'=>Auth::id(),'body'=>$request->get('body')]);

        $article_comment->name = Auth::user()->name;

        $article_comment->avatar = Auth::user()->avatar;

        $article_comment->createTime = date('Y-m-d',strtotime($article_comment->created_at));


        $article->increment('comments_count');

        return $article_comment;
  

    }
}    
