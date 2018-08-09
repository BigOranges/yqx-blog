<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\topics;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $topics = topics::get();
        return view('topic.show',compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        

        $destinationPath = 'upload/';
        // 取到图片
        $file = $request->avatar;
        // 获得图片的名称 为了保证不重复 我们加上userid和time
        if ($file == "") {
          flash('未选取图片','danger');
          return back();
        }else {
          $file_name = \Auth::user()->id . '_' . time() . $file->getClientOriginalName();
        }
        $topic = topics::create([
            'name'=>$request->name,
            'desc'=>$request->desc,
            'topic_pic'=> $file_name
        ]);
        $topic->save();


        // 执行move方法
        $file->move($destinationPath, $file_name);
        // 保存到User

        $topic_pic = topics::where('id',$topic->id)->first();
        $topic_pic->topic_pic = '/' . $destinationPath . $file_name;
        $topic_pic->save();

        return redirect('/topics');
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

        $topic = topics::findOrFail($id);

        $questions = $topic->questions()->get();

        $articles = $topic->articles()->get();

        

        return view('topic.detail',compact('topics','topic','questions','articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
