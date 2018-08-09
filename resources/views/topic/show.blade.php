@extends('layouts.app')

@section('css')
<style type="text/css">
  .container-page{
    min-height:1000px;
  }

  .item{
      position: relative;
      list-style: none;
      border-bottom: 1px dotted #eee;
      padding:0px;  
  }

  .blk{
    padding-left: 62px;
    margin: 18px 15px 18px 0;
  }

  .topic_img{
    position: absolute;
    left: 0;
    width: 50px;
    height: 50px;
    border-radius: 3px;
  }

  strong{
    display: inline-block;
    height: 1.5em;
    word-wrap: normal;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  
  .follow{
    position: absolute;
    top: 18px;
    right: 15px;
  }

  p{
    margin: 0;
    padding: 0;    
  }

  #topic{
    display:block;
  }

  #add{
    display:none;
  }
</style>
@endsection

@section('content')
<section class="container container-page">
  <div class="pageside">
    <div class="pagemenus">
      <ul class="pagemenu">
        <li><a id='showTopic'>标签&话题</a></li>
        <li><a id='addTopic'>添加</a></li>
      </ul>
    </div>
  </div>
  <div>
    <!--话题展示-->
    <div class="content"  id='topic'>
      
      <header class="article-header">
        <h1 class="article-title">标签&话题</h1>
      </header>
      <div class="row" style='padding:15px'>
        @foreach($topics as $topic)
        <div class="col-md-4 item">
          <div class="blk">
            <a href="/topics/{{$topic->id}}">
              <img src="{{$topic->topic_pic ? $topic->topic_pic : '/upload/topic.jpg'}}" alt="" class='topic_img'>
              <strong>{{$topic->name}}</strong>
            </a>
            <p>{{$topic->desc ? $topic->desc : '暂无描述'}}</p>
            <a class='follow' info='{{$topic->id}}'>
              
              @if(!Auth::user()->isFollowTopic($topic->id))
                <span class='glyphicon glyphicon-plus'></span>
                <span>关注</span>
              @else
                <span>已关注</span>
              @endif

            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    <!--话题添加-->
    <div class="content" id='add'>
      <header class="article-header">
        <h1 class="article-title">添加标签&话题</h1>
      </header>
      <div class="row" style='padding:15px'>
          <div class='col-md-12'>
              {!!Form::open(['url'=>'/topics','method'=>'post','files'=>true])!!}
              <div class="modal-header">
                  <h4 class="modal-title">话题内容</h4>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                      {!! Form::label('name','话题名称')!!}
                      {!! Form::text('name',null,['class'=>'form-control','placeholer'=>'请输入话题名称','required'=>'required']) !!}
                  </div>
                  <div class="form-group">
                      {!! Form::label('demo','话题描述')!!}
                      {!! Form::text('desc',null,['class'=>'form-control','placeholer'=>'请输入话题话题描述','required'=>'required']) !!}
                  </div>
                  <div class="form-group">
                      {!! Form::label('title','话题图片')!!}
                      {!! Form::file('avatar') !!}
                  </div>
              </div>
              <div class="modal-footer">
                  {!!Form::submit('提交',['class'=>'btn btn-default blue btn-block'])!!}
              </div>
              {!! Form::close() !!}
          </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('script')
<script type="text/javascript">
    var topics = {!!$topics!!}

    var aa = new Vue({
      el:'#topic',
      data:{
        todos:topics
      }
    })
</script>
<script type="text/javascript">
  $('#addTopic').click(function(){
      $('#add').show('solw');

      $('#add').siblings().hide();
  })

  $('#showTopic').click(function(){
      $('#topic').show('solw');

      $('#topic').siblings().hide();
  })
</script>

<script type="text/javascript">
  $('.follow').click(function(){

      var topics_id = $(this).attr('info');

      $.ajax({
        url:'/follow/topic',
        data:{topics_id:topics_id},
        type:'get',
        success:(mes)=>{
            
            if(mes.attached>0){
              $(this).text('已关注');
            }else{
              $(this).html("<span class='glyphicon glyphicon-plus'></span><span>关注</span>");
            }
        }
      })
  })
</script>
@endsection

