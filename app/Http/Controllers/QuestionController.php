<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\QuestionRepository;
use Auth;
use App\question;
use App\topics;
use App\Answer;
use App\Comment;

class QuestionController extends Controller
{
 	
	protected $questionRepository;

	 public function __construct(QuestionRepository $questionRepository){

        $this->middleware('auth')->except(['index','show']);
        $this->questionRepository = $questionRepository;
    }

    protected function create(Request $request){

    	$arr = $this->questionRepository->deal($request->get('topics'));

        $data = array_merge($request->all(),['user_id'=>Auth::id()]);
        
        $question = $this->questionRepository->create($data);

        //关联数据
        $question->topics()->attach($arr);

        //添加user表的关联关系
        $question->user()->increment('questions_count');

        //添加user_question follow表中的关联关系
        $this->questionRepository->follow($question->id);

        //跳转
        return redirect('/');
    }


    public function index($id){

        $topics = topics::get();

        $question = question::findOrFail($id);
       
        $answers = $question->answers;
        
        $str = '';

        foreach($answers as $answer){

           $answer->userName = $answer->user->name;
           $answer->userAvatar = $answer->user->avatar;
           $str = $answer->created_at;
           $answer->createTime = $answer->create_time($str);
          
        }
        
        $r = question::with('comments','comments.user')->where('id',$id)->first();

        $comments = new comment();

        foreach($r->comments as $k=>$com){

            $com->createTime = date('Y-m-d',strtotime($com->created_at));
            $comments->$k = $com;
            
        }

        
        return view('question.index',compact('topics','question','answers','comments'));

        
    }


    public function store(){
        
        dump('asdf');
    }
}
?>