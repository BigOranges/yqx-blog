<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta author="zrong.me 曾荣">
	<title>登录 - 千寻 - Thousands Find</title>
	<link rel="stylesheet" type="text/css" href="sy/style/register-login.css">
</head>
<body>
<div id="box"></div>
<div class="cent-box">
	<div class="cent-box-header">
		<a href='/'><h1 class="main-title hide"></h1></a>
		<h2 class="sub-title">热爱生活 - 爱分享</h2>
	</div>

	<div class="cont-main clearfix">
		<div class="index-tab">
			<div class="index-slide-nav">
				<a href="{{ route('login') }}" class="active">登录</a>
				<a href="{{ route('register') }}">注册</a>
				<div class="slide-bar"></div>				
			</div>
		</div>
		<form class="form-horizontal" method="POST" action="{{ route('login') }}">
		{{ csrf_field() }}
		<div class="login form">
			<div class="group">
				<div class="group-ipt email">
					<input type="email" name="email" id="email" class="form-control" placeholder="邮箱地址或手机号码" required>

					<!-- <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus> -->
				</div>
				<div class="group-ipt password">
					<input type="password" name="password" id="password" class="ipt" placeholder="输入您的登录密码" required>

					<!-- <input id="password" type="password" class="form-control" name="password" required> -->
				</div>
				<div class="group-ipt verify">
					<input type="text" name="verify" id="verify" class="ipt" placeholder="输入验证码" required>
					<!-- <img src="http://zrong.me/home/index/imgcode?id=" class="imgcode"> -->
				</div>
			</div>
		</div>

		<div class="button">
			<button type="submit" class="login-btn register-btn" id="button">登录</button>
		</div>
		</form>
		<div class="remember clearfix">
			<label class="remember-me"><span class="icon"><span class="zt"></span></span><input type="checkbox" name="remember-me" id="remember-me" class="remember-mecheck" checked>记住我</label>
			<label class="forgot-password">
				<a href="#">忘记密码？</a>
			</label>
		</div>
	</div>
</div>

<div class="footer">
	<p>##### - #####</p>
	<p>Designed By ZengRong & <a href="zrong.me">zrong.me</a> 2016</p>
</div>

<script src='sy/js/particles.js' type="text/javascript"></script>
<script src='sy/js/background.js' type="text/javascript"></script>
<script src='sy/js/jquery.min.js' type="text/javascript"></script>
<script src='sy/js/layer/layer.js' type="text/javascript"></script>
<script>
	$('.imgcode').hover(function(){
		layer.tips("看不清？点击更换", '.verify', {
        		time: 6000,
        		tips: [2, "#3c3c3c"]
    		})
	},function(){
		layer.closeAll('tips');
	}).click(function(){
		$(this).attr('src','http://zrong.me/home/index/imgcode?id=' + Math.random());
	});


	$("#remember-me").click(function(){
		var n = document.getElementById("remember-me").checked;
		if(n){
			$(".zt").show();
		}else{
			$(".zt").hide();
		}
	});
</script>
</body>
</html>