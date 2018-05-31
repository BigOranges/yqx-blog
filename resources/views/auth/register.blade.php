<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>注册 - 素材火 - 素材火</title>
    <meta author="zrong.me 曾荣">
    <link rel="stylesheet" type="text/css" href="sy/style/register-login.css">
    <style type="text/css">
        #phone{
            border-top:1px solid #E8E8E8;
        }
    </style>
</head>
<body>
<div id="box"></div>
<div class="cent-box register-box">
    <div class="cent-box-header">
        <a href='/'><h1 class="main-title hide"></h1></a>
        <h2 class="sub-title">热爱生活 - 爱分享</h2>
    </div>

    <div class="cont-main clearfix">
        <div class="index-tab">
            <div class="index-slide-nav">
                <a href="{{ route('login') }}">登录</a>
                <a href="{{ route('register') }}" class="active">注册</a>
                <div class="slide-bar slide-bar1"></div>                
            </div>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <input type="hidden" name='key' value='' id='key'>
        <div class="login form">
            <div class="group">
                <div class="group-ipt email form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" id="email" class="ipt" placeholder="邮箱地址" required>
                </div>
                     @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                
                <div class="group-ipt email">
                    <input type="text" name="phone" id="phone" class="ipt" placeholder="电话号码" required>
                </div>
                <div class="group-ipt user">
                    <input type="text" name="name" id="user" class="ipt" placeholder="选择一个用户名" required>
                </div>
                <div class="group-ipt password">
                    <input type="password" name="password" id="password" class="ipt" placeholder="设置登录密码" required>
                </div>
                <div class="group-ipt password1">
                    <input type="password" name="password_confirmation" id="password1" class="ipt" placeholder="重复密码" required>
                </div>
                <div class="group-ipt verify">
                    <input type="text" name="verify" id="verify" class="ipt" placeholder="输入验证码" required>
                    <!-- <img src="http://zrong.me/home/index/imgcode?id=" class="imgcode"> -->
                    <button class='imgcode' type='javascript:;'>获取验证码</button>
                </div>
            </div>
        </div>
        {{dump($errors)}}
        <div class="button">
            <button type="submit" class="login-btn register-btn" id="button">注册</button>
        </div>
        </form>
    </div>
</div>

<div class="footer">
    <p>#### - ####</p>
    <p>Designed By ZengRong & <a href="zrong.me">zrong.me</a> 2016</p>
</div>

<script src='sy/js/particles.js' type="text/javascript"></script>
<script src='sy/js/background.js' type="text/javascript"></script>
<script src='sy/js/jquery.min.js' type="text/javascript"></script>
<script src='sy/js/layer/layer.js' type="text/javascript"></script>

<script>
 

    $(".login-btn").click(function(){
        var email = $("#email").val();
        var password = $("#password").val();
        var verify = $("#verify").val();
        // $.ajax({
        // url: 'http://www.zrong.me/home/index/userLogin',
        // type: 'post',
        // jsonp: 'jsonpcallback',
        // jsonpCallback: "flightHandler",
        // async: false,
        // data: {
        //  'email':email,
        //  'password':password,
        //  'verify':verify
        // },
        // success: function(data){
        //  info = data.status;
        //  layer.msg(info);
        // }
        // })

    })


    $('.imgcode').click(function(){
        var phone = $('#phone').val();
        $.ajax({

            url:'api/verificationcodes',
            data:{phone:phone},
            type:'post',
            success:function(obj){

                $('#key').val(obj.key);
                var obj = $('.imgcode');  
                // 重新发送倒计时  
                var validCode = true;  
                var time=10;  
                if (validCode) {  
                    validCode = false;  
                    var t = setInterval(function  () {  
                        time --;  
                        $(obj).html('重新获取('+time+'s)');
                        $(obj).attr('disabled','disabled');  
                        if (time==0) {  
                            clearInterval(t);  
                            $(obj).html("重新获取"); 
                            $(obj).removeAttr('disabled'); 
                            validCode = true;  
                            sms_flag = true;  
                        }  
                    },1000);  
                }  
            }
        })


        

        return false;
    })
</script>
</body>
</html>