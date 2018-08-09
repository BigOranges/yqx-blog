<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\topics;
use App\articles;
use Auth;
use App\Repositories\ArticleRepository;


class ArticleController extends Controller
{   

    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository){
        $this->articleRepository = $articleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dump('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = topics::get();
        return view('article.create',compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $file = $request->file('upload_file');

        $allowed_extensions = ["png", "jpg", "gif"];

          if ($file->getClientOriginalExtension() && in_array($file->getClientOriginalExtension(), $allowed_extensions)){

                $destinationPath = 'upload/'; //public 文件夹下面建 /uploads 文件夹
                $extension = $file->getClientOriginalExtension(); //获取后缀名
                $fileName = str_random(10).'.'.$extension; //新的文件名

                $file->move($destinationPath,$fileName);   //移动

                $filePath = asset($destinationPath.$fileName);
                

                $article = articles::create([
                    'title'=>$request->get('title'),
                    'body'=>$request->get('body'),
                    'bg_img'=>$filePath,
                    'user_id'=>Auth::id()
                ]);


                $arr = $this->articleRepository->deal($request->get('topics'));

                //关联文章和话题
                $article->topics()->attach($arr);

                //默认关注文章
                $this->articleRepository->follow($article->id);

                return redirect('/articles/'.$article->id);
          }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topics = topics::get();
        $article = articles::findOrfail($id);

        $r =   articles::with('comments','comments.user')->where('id',$id)->first();

        return view('article.show',compact('article','topics','r'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dump('edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
