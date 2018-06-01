<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>异清轩博客</title>
<link rel="stylesheet" type="text/css" href="home/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="home/css/nprogress.css">
<link rel="stylesheet" type="text/css" href="home/css/style.css">
<link rel="stylesheet" type="text/css" href="home/css/font-awesome.min.css">
<link rel="apple-touch-icon-precomposed" href="home/images/icon/icon.png">
<link rel="shortcut icon" href="home/images/icon/favicon.ico">
<link href="select2.css" rel="stylesheet" />
<script src="home/js/jquery-2.1.4.min.js"></script>
<script src="home/js/nprogress.js"></script>
<script src="home/js/jquery.lazyload.min.js"></script>
<script src='wang.js'></script>
<style type="text/css">
    #mtk{
      padding:40px;
    }
</style>
<!-- [if gte IE 9]>
  <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="js/html5shiv.min.js" type="text/javascript"></script>
  <script src="js/respond.min.js" type="text/javascript"></script>
  <script src="js/selectivizr-min.js" type="text/javascript"></script>
<![endif]
<!--[if lt IE 9]>
  <script>window.location.href='upgrade-browser.html';</script>
<![endif]-->
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
          <li><a href="tags.html">标签云</a></li>
          <li><a href="readers.html" rel="nofollow">读者墙</a></li>
          <li><a href="links.html" rel="nofollow">友情链接</a></li>
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
        <h1 class="logo hvr-bounce-in"><a href="" title=""><img src="home/images/logo.png" alt=""></a></h1>
      </div>
      <div class="collapse navbar-collapse" id="header-navbar">
        <ul class="nav navbar-nav navbar-right">
          <li class="hidden-index active"><a data-cont="异清轩首页" href="index.html">异清轩首页</a></li>
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
    <li class="list-group-item"><span>地址：</span>河南省郑州市</li>
    <li class="list-group-item"><span>系统：</span>Windows10 </li>
    <li class="list-group-item"><span>浏览器：</span>Chrome47</li>
  </ul>
</div>


<div class="modal fade bs-example-modal-lg"  role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id='mtk'>
  
      <form action='/question/create' method='POST' >
      <input type="hidden" name='token' value='{{csrf_token()}}'>
        <div class="form-group">
          <label for="exampleInputEmail1">标题</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="title">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">话题&标签</label>
          <br>
          <select class="js-example-basic-multiple js-example-tokenizer" tokenSeparators name="states[]" multiple="multiple" style='width:100%'>
            <option value="AL">Alabama</option>
              ...
            <option value="WY">Wyoming</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">text</label>
          <div id='div3'></div>
          <script type="text/javascript">
            var E = window.wangEditor
            var editor2 = new E('#div3')
            
            editor2.customConfig.uploadImgShowBase64 = true
            editor2.create()
          </script>
          <p class="help-block">Example block-level help text here.</p>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>

    </div>
  </div>
</div>

<script src="home/js/bootstrap.min.js"></script> 
<script src="home/js/jquery.ias.js"></script> 
<script src="home/js/scripts.js"></script>

<script src='{{asset("js/vue.js")}}'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
$(".js-example-tokenizer").select2({
    tags: true,
    tokenSeparators: [',', ' ']
})
</script>

<script type="text/javascript">

  
</script>
</body>
</html>