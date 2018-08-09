@extends('layouts.app')

@section('css')
<style type="text/css">
body{
	background:#fff;
}
.main{
	margin: 47px auto 0;
    padding: 0;
    width: 660px;
    z-index: 1;
}

.wrapper{
	
	 background: #E9E9E9;
    line-height: 192px;
    color: gray;
    min-height: 192px;
    text-align: center;
    position: relative;
}

.imgs{
	font-size: 42px;
    color: #000;
    color: rgba(0,0,0,.2);
    line-height:192px;
}

.apper{

    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    position: relative;
}

.uploadInput{
	position: absolute;
    display:block;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    opacity: 0;
    cursor: pointer;
    z-index: 2;
    background-color:#F6F6F6;
}

.titleInput{
	margin: 16px 0;
    border: 0;
    padding: 0;
    height: auto;
    width: 100%;
    position: relative;

}

.Input{
	height: 44px;
    min-height: 44px;
    display: block;
    width: 100%;
    border: 0;
    font-size: 32px;
    line-height: 1.4;
    font-weight: 600;
    font-synthesis: style;
    outline: none;
    box-shadow: none;
}

.reda{
	margin-top:15px;
}

#bg_img{
    display:none;
}

.del{
    position: absolute;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-direction: row;
    flex-direction: row;
    height: 42px;
    right: 0;
    bottom: 0;
    z-index: 10 ;
    border-radius: 4px 0 0 0;
    border: 0;
    display:none;
}

.delButton{
    width: 48px;
    height:100%;
    border: 0;
    background: rgba(0,0,0,.75);
    border-radius: 0;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    padding: 0;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

#test3{
    display:none;
}
</style>
@endsection

@section('content')
	<div class="main">
         <form action="{{asset('/articles')}}" method="post" enctype='multipart/form-data'>
        {{ csrf_field() }}
        <div class="wrapper" >
		  <div class="apper">
				<i class="glyphicon glyphicon-camera imgs"></i>
				<input type="file" class="uploadInput" name="upload_file" accept=".jpeg, .jpg, .png" id='file' value=''>
			</div>
            <div class='apper'>
                <img src=""  id='bg_img' style='width:100%' name='bg_img'>
            </div>
            <div class='del'>
                <button type="button" class="delButton"><span class='glyphicon glyphicon-trash'></span></button>
            </div>
		</div>
		<div class='titleInput'>
			<textarea rows="1" class="Input" placeholder="请输入标题" style="height: 44px;" name='title' required></textarea>
		</div>
		<div>
			<select class="js-example-basic-multiple-limit" name="topics[]" style='width:100%' multiple="multiple" placeholder="请输入标题">

              @foreach($topics as $topic)
              <option value='{{$topic->id}}'>{{$topic->name}}</option>
              @endforeach
			</select>
		</div>
		<div class='reda'>
			<div id="div3"></div>
            <textarea id="text3" name="body"></textarea>
		</div>
        <div class='col-md-12' style='padding:15px'>
            <button type="submit" class="btn btn-default" style='float:right'>发布
                <span class='glyphicon glyphicon-menu-down'></span>
            </button>  
        </div>
        </form>
	</div>
@endsection

@section('script')
<script type="text/javascript">
	

	$(".js-example-basic-multiple-limit").select2({
		  maximumSelectionLength: 2
	});


	$('#file').change(function(){
        var pic = this.files[0];
		
        picture(pic);
        $(this).parent().hide();
        $('.del').show();

	})

    function picture(pic){
        var r = new FileReader();

        r.readAsDataURL(pic);

        r.onload = function(e){
            $('#bg_img').parent().show();
            $("#bg_img").attr('src',this.result).show();
        }
    }

    $('.delButton').click(function(){

        $('#bg_img').attr('src','');
        $(this).parent().prev().prev().show();
        $(this).parent().prev().hide();
        $(this).parent().hide();
    })

</script>

<script type="text/javascript">
    
   var E = window.wangEditor;
   var editor3 = new E('#div3');
    editor3.customConfig.zIndex = 10;
    editor3.customConfig.uploadImgShowBase64 = true

    editor3.customConfig.menus = [
      'head',  // 标题
      'bold',  // 粗体
      'fontSize',  // 字号
      'fontName',  // 字体
      'italic',  // 斜体
      'underline',  // 下划线
      'strikeThrough',  // 删除线
      'foreColor',  // 文字颜色
      'backColor',  // 背景颜色
      'link',  // 插入链接
      'list',  // 列表
      'justify',  // 对齐方式
      'quote',  // 引用
      'emoticon',  // 表情
      'image',  // 插入图片
      'table',
      'video'
    ]

     var $text3 = $('#text3')
        editor3.customConfig.onchange = function (html) {
            // 监控变化，同步更新到 textarea
            $text3.val(html)
   }
     editor3.create();

    $text3.val(editor3.txt.html())
</script>
@endsection