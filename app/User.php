<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\follow_question;
use Auth;
use App\follow_articles;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','confirmation_token','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //问题关注
    public function follows(){

       return $this->belongsToMany('App\question','user_question')->withTimestamps();
    }

    public function followThis($question_id){

       return $this->follows()->toggle($question_id);
    }

    public function followed($question_id){

       return follow_question::where('question_id',$question_id)->where('user_id',$this->id)->count();
    }

    //用户关注
    public function follows_user(){

        return $this->belongsToMany(self::class,'followeds','follower_id','followed_id')->withTimestamps();
    }

    public function followThis_user($user_id){

        return $this->follows_user()->toggle($user_id);
    }

    //判断用户 关注
    public function followed_user($user_id){

        $arr = Auth::user()->follows_user()->pluck('followed_id')->toArray();

        if(in_array($user_id,$arr)){

            return 'true';
        }else{
            return 'false';
        }   
    }

    //文章点赞
    public function like_articles(){

       return $this->belongsToMany('App\articles','like_articles')->withTimestamps();
    }
    

    public function articleFollowThis($article_id){

       return $this->like_articles()->toggle($article_id);
    }

    //文章收藏
    public function follow_articles(){

       return $this->belongsToMany('App\articles','follow_articles')->withTimestamps();
    }

    public function collect_article($article_id){
        return $this->follow_articles()->toggle($article_id);
    }

    //判断是否收藏
    public function isFollowArticle($article_id){

        return follow_articles::where('user_id',Auth::id())->where('articles_id',$article_id)->count();
    }


    //话题关注
    public function topics(){

       return $this->belongsToMany('App\topics','user_topics')->withTimestamps();
    }

    public function follow_topics($topic_id){
        return $this->topics()->toggle($topic_id);
    }

    //判断是否关注topic
    public function isFollowTopic($topic_id){

        return user_topics::where('user_id',Auth::id())->where('topics_id',$topic_id)->count();
    }
}
