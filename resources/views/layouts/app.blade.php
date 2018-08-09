<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

 <meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', '千寻') }}</title>

<link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('home/css/nprogress.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('home/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('home/css/font-awesome.min.css')}}">
<link rel="apple-touch-icon-precomposed" href="{{asset('home/images/icon/icon.png')}}">
<link rel="shortcut icon" href="{{asset('home/images/icon/favicon.ico')}}">

<link href="{{asset('select2.css')}}" rel="stylesheet" />
<script src="{{asset('home/js/jquery-2.1.4.min.js')}}"></script>

<script src="{{asset('home/js/nprogress.js')}}"></script>
<script src="{{asset('home/js/jquery.lazyload.min.js')}}"></script>
<script src="{{asset('wang.js')}}"></script>
<style type="text/css">
    #mtk{
      padding:40px;
    }

    textarea{
      display:none;
    }
</style>


@section('css')

@show

</head>
<body class="user-select">

<header class="header">
  <nav class="navbar navbar-default" id="navbar">
    <div class="container">
      <div class="header-topbar hidden-xs link-border">
        <ul class="site-nav topmenu">
          @auth
          <li><a  data-toggle="modal" data-target=".bs-example-modal-lg">提问</a></li>
          @endauth
          <li><a href="{{asset('topics')}}">标签&话题</a></li>
          <li><a href="/articles/create" rel="nofollow">写文章</a></li>
          <li><a href="/notification" rel="nofollow"><span class="glyphicon glyphicon-bell" aria-hidden="true" style='color:#A8A8A8'></span><span style="color:red">{{Auth::user()->notifications->where('read_at','')->count() ? Auth::user()->notifications->where('read_at','')->count() : ''}}</span></a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" rel="nofollow">关注本站 <span class="caret"></span></a>
            <ul class="dropdown-menu header-topbar-dropdown-menu">
              <li><a data-toggle="modal" data-target="#WeChat" rel="nofollow"><i class="fa fa-weixin"></i> 微信</a></li>
              <li><a href="#" rel="nofollow"><i class="fa fa-weibo"></i> 微博</a></li>
              <li><a data-toggle="modal" data-target="#areDeveloping" rel="nofollow"><i class="fa fa-rss"></i> RSS</a></li>
            </ul>
          </li>
        </ul>
        @if(!Auth::check())
        <a href='{{route("login")}}' class="login" rel="nofollow">Hi,请登录</a>&nbsp;&nbsp;
        <a href="{{route('register')}}" class="register" rel="nofollow">我要注册</a>&nbsp;&nbsp;
        <a href="" rel="nofollow">找回密码</a>
        @else
        <a href="" rel="nofollow">个人中心</a>&nbsp;&nbsp;
        <a href="{{route('logout')}}" rel="nofollow" onclick="event.preventDefault();document.getElementById('logout-form').submit();">退出</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        @endif
         </div>
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar" aria-expanded="false"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <h1 class="logo hvr-bounce-in"><a href="" title=""><img src="{{asset('home/images/logo.png')}}" alt=""></a></h1>
      </div>
      <div class="collapse navbar-collapse" id="header-navbar">
        <ul class="nav navbar-nav navbar-right">
          <li class="hidden-index active"><a data-cont="异清轩首页" href="/">异清轩首页</a></li>
          <li><a href="category.html">前端技术</a></li>
          <li><a href="category.html">后端程序</a></li>
          <li><a href="category.html">管理系统</a></li>
          <li><a href="category.html">授人以渔</a></li>
          <li><a href="category.html">程序人生</a></li>
        </ul>
        <form class="navbar-form visible-xs" action="/Search" method="post">
          <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="请输入关键字" maxlength="20" autocomplete="off">
            <span class="input-group-btn">
            <button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
            </span> </div>
        </form>
      </div>
    </div>
  </nav>
</header>
@section('content')

@show
<footer class="footer">
  <div class="container">
    <p>&copy; 2016 <a href="">ylsat.com</a> &nbsp; <a href="#" target="_blank" rel="nofollow">豫ICP备20151109-1</a> &nbsp; &nbsp; <a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
  </div>
  <div id="gotop"><a class="gotop"></a></div>
</footer>
<!--微信二维码模态框-->
<div class="modal fade user-select" id="WeChat" tabindex="-1" role="dialog" aria-labelledby="WeChatModalLabel">
  <div class="modal-dialog" role="document" style="margin-top:120px;max-width:280px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="WeChatModalLabel" style="cursor:default;">微信扫一扫</h4>
      </div>
      <div class="modal-body" style="text-align:center"> <img src="images/weixin.jpg" alt="" style="cursor:pointer"/> </div>
    </div>
  </div>
</div>
<!--该功能正在日以继夜的开发中-->
<div class="modal fade user-select" id="areDeveloping" tabindex="-1" role="dialog" aria-labelledby="areDevelopingModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="areDevelopingModalLabel" style="cursor:default;">该功能正在日以继夜的开发中…</h4>
      </div>
      <div class="modal-body"> <img src="images/baoman/baoman_01.gif" alt="深思熟虑" />
        <p style="padding:15px 15px 15px 100px; position:absolute; top:15px; cursor:default;">很抱歉，程序猿正在日以继夜的开发此功能，本程序将会在以后的版本中持续完善！</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">朕已阅</button>
      </div>
    </div>
  </div>
</div>
<!--登录注册模态框-->
<div class="modal fade user-select" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <form class="form-horizontal" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="loginModalLabel">登录</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="loginModalUserNmae">用户名</label>
            <input type="email" class="form-control" id="loginModalUserNmae" placeholder="请输入用户名" autofocus name='email' autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="loginModalUserPwd">密码</label>
            <input type="password" name='password' class="form-control" id="loginModalUserPwd" placeholder="请输入密码" maxlength="18" autocomplete="off" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="submit" class="btn btn-primary">登录</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--右键菜单列表-->
<div id="rightClickMenu">
  <ul class="list-group rightClickMenuList">
    <li class="list-group-item disabled">欢迎访问异清轩博客</li>
    <li class="list-group-item"><span>IP：</span>172.16.10.129</li>
    <li class="list-group-item"><span>地址：</span>北京市</li>
    <li class="list-group-item"><span>系统：</span>Windows10 </li>
    <li class="list-group-item"><span>浏览器：</span>Chrome47</li>
  </ul>
</div>


<div class="modal fade bs-example-modal-lg"  role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id='mtk'>
    {!!Form::open(["url"=>action("QuestionController@create"),"method"=>"post"])!!}
       <div class="form-group">
          <label for="exampleInputEmail1">标题</label>
           {!!Form::text("title",null,["class"=>"form-control","id"=>"exampleInputEmail1","placeholer"=>"请输入标题","minlength"=>4,"required"=>'required'])!!}
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">话题&标签</label>
          <br>
          <select class="js-example-basic-multiple js-example-tokenizer" tokenSeparators name="topics[]" multiple="multiple" style="width:100%" id='sel' required>
            <option v-for="todo in todos" :value='todo.id'>@{{todo.name}}</option>
          </select>
        </div>
         <div class="form-group">
          <label for="exampleInputFile">text</label>
            <div id="div1"></div>
          <textarea id="text1" name="body"></textarea>
          <p class="help-block">Example block-level help text here.</p>
        </div>
        <button type="submit" class="btn btn-default" id="tijiao">Submit</button>
    {!!Form::close()!!}
    </div>
  </div>
</div>
<div id="app"></div>
<script src="{{asset('home/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('home/js/jquery.ias.js')}}"></script> 
<script src="{{asset('home/js/scripts.js')}}"></script>
<!-- <script type="text/javascript" src='{{asset("js/app.js")}}'></script> -->
<script src='{{asset("js/vue.js")}}'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script> -->
<script type="text/javascript">
 
  var topics = {!!$topics!!};
  
  var aa = new Vue({
      el:'#sel',
      data:{
        todos:topics   
      }
  })
</script>

<!-- select2 -->
<script type="text/javascript">
$(".js-example-tokenizer").select2({
    tags: true,

    tokenSeparators: [',', ' ']
})

</script>

<!-- wangedit编辑器 -->
<script type="text/javascript">


$(document).ready(function(){


  var E = window.wangEditor;

  //创建问题编辑器
  var editor = new E('#div1');

  //创建答案编辑器
  var editor2 = new E('#div2');
  
  editor2.customConfig.zIndex = 100;
 
  

  editor.customConfig.uploadImgMaxSize = 2 * 1024 * 1024;
 
  editor.customConfig.customUploadImg = function (files, insert) {
    // files 是 input 中选中的文件列表
    // insert 是获取图片 url 后，插入到编辑器的方法  
    var formdata =  new FormData();
    formdata.append('pic',files[0]);
    $.ajax({
            url:'/upload/img',
            data:formdata,//图片资源
            type:'post',
            // async:false,
            // cahce:false,
            //设置请求头格式为null
            contentType:false,  
            //设置数据格式为null
            processData:false,
            headers:{
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(mes){ 
              console.log(mes);
              // 上传代码返回结果之后，将图片插入到编辑器中
              insert(mes)  
            }
      });
  }

 editor2.customConfig.customUploadImg = function (files, insert) {
    // files 是 input 中选中的文件列表
    // insert 是获取图片 url 后，插入到编辑器的方法  
    var formdata =  new FormData();
    formdata.append('pic',files[0]);
    $.ajax({
            url:'/upload/img',
            data:formdata,//图片资源
            type:'post',
            // async:false,
            // cahce:false,
            //设置请求头格式为null
            contentType:false,  
            //设置数据格式为null
            processData:false,
            headers:{
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(mes){ 
              console.log(mes);
              // 上传代码返回结果之后，将图片插入到编辑器中
              insert(mes)  
            }
      });
  }
   

   var $text1 = $('#text1')
        editor.customConfig.onchange = function (html) {
            // 监控变化，同步更新到 textarea
            $text1.val(html)
   }

   var $text2 = $('#text2')
        editor2.customConfig.onchange = function (html) {
            // 监控变化，同步更新到 textarea
            $text2.val(html)
   }



  editor.create();
  editor2.create();
 

  $text1.val(editor.txt.html())
  $text2.val(editor2.txt.html())
})
</script>


@section('script')

@show
</body>
</html>

