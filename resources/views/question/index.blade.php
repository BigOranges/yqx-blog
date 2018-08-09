@extends('layouts.app')

@section('css')
<style type="text/css">
	.header{
		background:#FFF;
	}

	#tou{
		padding-top:10px;
		padding-bottom:10px;
		margin-bottom:2px;
	}
	.center-block{
		 display: block;
		 width:1130px;
  		margin-left: auto;
  		margin-right: auto;
  		height:1000px;
  		
	}
	.num{
		text-align:center;
	}
	.col{
		color:#8590A6;
	}
	.stro{
		font-size:18px;
	}
	.topic{
		position: relative;
	    display: inline-block;
	    height: 30px;
	    padding: 0 12px;
	    font-size: 14px;
	    line-height: 30px;
	    color: #0084ff;
	    vertical-align: top;
	    border-radius: 100px;
	    background: rgba(0,132,255,.1);
	    margin-top:5px;
	}

	.r_title{

	    margin-bottom: 4px;
	    font-size: 22px;
	    font-weight: 600;
	    
	    line-height: 32px;
	    color: #1a1a1a;
	}

	.ztext{
		padding-bottom:10px;
		padding-top:10px;
	}

	.blue{
		color: #fff;
    	background-color: #0084ff;
	}

	.ans{
		color: #0084ff;
    	border-color: #0084ff;
	}
	
	.button{
		 margin:0 8px;
		 padding-left:15px;
		 padding-right:15px;
	}
	.group{
		display:inline-block;
    	margin-left:8px;
    	padding:0px;
	}
	.button-plain{
		height: auto;
	    padding: 0;
	    line-height: inherit;
	    background-color: transparent;
	    border: none;
	    border-radius: 
	}
	.jvz{
		padding:0px;
		display:flex;/*Flex布局*/
    	display:-webkit-flex; /* Safari */
    	align-items:center;/*指定垂直居中*/
	}

	.QuestionAnswer{
		padding: 16px 16px;
		margin:10px 0;
		background:#FFF;
		border:1px solid #EFEFEF;
	}

	.AnswerU{
		padding:0px;
		display: flex;
	    -webkit-box-align: center;
	    -ms-flex-align: center;
	    align-items: center;
	}

	.avatar{
		width:50px;
		height:50px;
	}

	.UserImg{
		width:50px;
		height:50px;
		background: rgb(255, 255, 255);
   		border-radius: 2px;
	}

	.UserInfo{
		-webkit-box-flex: 1;
    	margin-left: 14px;
    	flex: 1 1 0%;
    	overflow: hidden;
	}

	.UserName{
		display: flex;
    	-webkit-box-align: center;
    	align-items: center;
    	font-size: 15px;
    	line-height: 1.1;
    	flex-shrink: 0;
    	font-weight: 600;
	}

	.AnswerContent{
		margin-top: 9px;
    	margin-bottom: -4px;
   		overflow: hidden;
	}
	.ConTime{
		margin-top: 10px;
    	font-size: 14px;
    	color: #8590a6;
	}

	.ContentItem-actions{
		display: -webkit-box;
	    display: -ms-flexbox;
	    display: flex;
	    -webkit-box-align: center;
	    -ms-flex-align: center;
	    align-items: center;
	    padding: 10px 35px;
	    margin: 0 -15px -10px;
	    color: #646464;
	    background: #fff;
	    clear: both;
	}
	
	.like{
		display: inline-block;
	    padding: 0 16px;
	    font-size: 14px;
	    line-height: 32px;
	    color: #8590a6;
	    text-align: center;
	    cursor: pointer;
	    background:#E5F2FF;
	    border: 1px solid #E5F2FF;
	    border-radius: 3px;
	}

	.VoteButton{
		padding: 0 10px;
	    color: #0084ff;
	    background: rgba(0,132,255,.1);
	    border-color: transparent;
	} 
	
	.mess{
		margin-left:20px;
	}

	.grey{
		border-color: #77839c;
    	background-color: #77839c;
	}
	.user{
		padding:15px;
		border-top:1px solid #E6E6E6;
	}
	.sub{
		padding:10px;
		border-bottom:1px solid #E6E6E6;
	}
	#subans{
		float:right;
		margin-right:30px;
	}
	.center_block{
		display: block;
  		margin-left: auto;
  		margin-right: auto;
  		border:1px solid #E6E6E6;
  		height:70px;
  		width:70px;
	}
	#mz{
		text-align:center;
		color:#57ABD4;
		padding:10px;
	}
	#gz{
		text-align:center;
	}
	.sign{
		padding-top:5px;
	}

	.topar{
		background: #fff;
	    border-bottom: 1px solid #f6f6f6;
	    display: -webkit-box;
	    display: -ms-flexbox;
	    display: flex;
	    -webkit-box-pack: justify;
	    -ms-flex-pack: justify;
	    justify-content: space-between;
	    -webkit-box-align: center;
	    -ms-flex-align: center;
	    align-items: center;
	    height: 50px;
	    padding: 0 20px;
	}

	.topar_title{
		-webkit-box-flex: 1;
    	-ms-flex: 1;
   		flex: 1;
	}

	.pl_img{
		width:25px;
		height:25px;
	}

	.pl{
		margin-bottom:8px;
		
	}
	.pl_bottom{
		padding:5px 0;
		border-bottom:1px solid #E6E6E6;
	}

	.ago{
		float: right;
	    font-size: 14px;
	    color: #8590a6;

	}
	.modal-body{
		height:400px;
		overflow:auto;
	}
	
	.pl_bt1{
		background-color:#80C1FF;
		color:#fff;
	}

	.pl_bt2{
		background-color:#0084FF;
	}

	.answerpl{
		margin-top:13px;
    	margin-bottom: -4px;
   		overflow: hidden;
   		display:none;
   		border:1px solid #EBEBEB;
	}
	.answerpl-title{
		font-size: 15px;
	    font-weight: 600;
	    font-synthesis: style;
	    color: #1a1a1a;
	}
	.pl_input{
		padding-left:0px;
		padding-right:0px;
		border:0px;
	}
</style>
@endsection

@section('content')

<!--头部分-->
<div class="col-md-12 header" id='tou'>
	<section class='container'>
			<div class="row">
				<div class="col-md-8">
					@foreach($question->topics as $topic)
						<div class='topic'>
							{{$topic->name}}
						</div>		
					@endforeach
				</div>
				<div class="col-md-4">
					<div class="col-md-8 col-md-offset-4">
						<div class="col-md-6 num" style='border-right:1px solid #EBEBEB'>
							<div class='col'>关注者</div>
							<strong class='stro'>1,234</strong>
						</div>
						<div class="col-md-6 num">
							<div class='col'>浏览量</div>
							<strong class='stro'>123,456</strong>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<h1 class='r_title'>
						{{$question->title}}
					</h1>
				</div>
				<div class="col-md-8 ztext">
					<div class=''>
						{!!$question->body!!}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 jvz">
					<div class="col-md-4 group">
						<button class='btn btn-default blue button' id='fllow' info='false'>关注问题</button>
						<button class='btn btn-default ans button' id='cAnswer'>
							<span class='glyphicon glyphicon-pencil'></span>
							写回答
						</button>
					</div>
					<div class="col-md-8 jvz">
						<button class='button-plain col' data-toggle="modal" data-target="#exampleModal">
						<span class='glyphicon glyphicon-leaf'></span>&nbsp;
						{{$question->commonts_count ? 0 : $question->comments_count}}&nbsp;条评论
						</button>
					</div>
				</div>
			</div>
	</section>
</div>
<!--内容部分-->
<section class='center-block'>
	<div class="row" style=''>
		<!--答案-->
		<div class="col-md-9">
			<!--答案编辑区-->
			@if(Auth::check())
			<div class="col-md-12 QuestionAnswer" style='display:none' id='area'>
				<div class="col-md-12 AnswerU user">
					<span class='UserImg'>
						<a href=""><img src="{{Auth::user()->avatar}}" alt="" class='avatar'></a>
					</span>
					<div class='UserInfo'>
						<div class='UserName'>{{Auth::user()->name}}</div>
						<div class='sign'>asdfsdfasfd</div>
					</div>
				</div>
				{!!Form::open(["url"=>action("AnswerController@store"),"method"=>"post"])!!}
				{!!Form::hidden('question_id',$question->id)!!}
				<div id="div2" class='col-md-12'></div>	
				<textarea id="text2" name="body"></textarea>
				<div class="col-md-12 sub">
					<button class="btn btn-default blue button" type='submit' id='subans'>提交答案</button>
				</div>
				{!!Form::close()!!}
			</div>
			@else
				<div class="col-md-12 QuestionAnswer" style='display:none'>
					<div id="div2" class='col-md-12'></div>	
				</div>
			@endif
			<!--答案部分-->
			<div id='answers'>
				<div class="col-md-12 QuestionAnswer" v-for='todo in todos'>
					<div class="col-md-12 AnswerU">
						<span class='UserImg'>
							<a href=""><img :src="todo.userAvatar" alt="" class='avatar'></a>
						</span>
						<div class='UserInfo'>
							<div class='UserName' v-text='todo.userName'>
								<!--答案作者-->
							</div>
						</div>
					</div>
					<div class="col-md-12 AnswerContent" v-html='todo.body'>
						<!--答案内容-->
					</div>
					<div class="col-md-12 ConTime">
						<span >编辑于 @{{todo.createTime}}</span>
					</div>
					<div class="col-md-12 ContentItem-actions">
						<span>
							<button class='like VoteButton'><span class='glyphicon glyphicon-triangle-top' style='margin-right:10px'></span>4.7K</button>
							<button class='like VoteButton'><span class='glyphicon glyphicon-triangle-bottom'></span></button>
						</span>
						<button class='button-plain col mess answerpl_button' :info='todo.id'>
								<span class='glyphicon glyphicon-leaf'></span>&nbsp;@{{todo.comments_count}}&nbsp;条评论
						</button>
					</div>
					<!--答案评论-->
					<div class='col-md-12 answerpl'>
						<div class="modal-header topar">
							<div class="topar_title">
								<h5 id="" class="answerpl-title">N条评论</h5>
							</div>
						</div>
						<div class="asdf" >		
							<!-- <div class="col-md-12 pl_bottom" v-for='pl in pls'>
								<div class="col-md-12 pl">
									<img src="/upload/06.gif" alt="" draggable="false" class="pl_img"> 
									<span>坑坑</span> 
									<span class="ago">2018-06-11</span>
								</div> 
								<div class="col-md-12 pl">
									题主这么问意思是指投资类的吧，但回答者基本都是靠工作上班赚的钱。
								</div>
								<div class="col-md-12">
									<button class="button-plain col">
									<span class="glyphicon glyphicon-leaf"></span>&nbsp;
										回复
									</button>
								</div>
							</div> -->
						</div>
						<div class="col-md-12">
							<div class="modal-footer pl_input">
								<div class="input-group">
									<input type="text" placeholder="写下你的评论..." minlength="4" class="form-control"> 
									<span  class="input-group-btn">
										<button type="button"   class="btn btn-default pl_answer" :info='todo.id'>评论</button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<!--答案评论结束-->
				</div>
			</div>
		</div>
		<!--右侧作者信息-->
		<div class="col-md-3 QuestionAnswer">
			<div class="col-md-12">
				<img src="{{$question->user->avatar}}" alt=""  class="img-circle center_block">
				<div id='mz'>{{$question->user->name}}</div>
			</div>
			<div class="col-md-12">
				<div class="col-md-6 num" style='border-right:1px solid #EBEBEB'>
					<div class='col'>职业</div>
					<strong class='stro'>矿工</strong>
				</div>
				<div class="col-md-6 num">
					<div class='col'>作品量</div>
					<strong class='stro'>123,456</strong>
				</div>
			</div>
			<div class="col-md-12 sub" style='text-align:center'>
			@if(Auth::id()!=$question->user->id)
				<button class="btn btn-default blue button" id='foll_btn'>关注</button>
				<button class="btn btn-default blue button">私信</button>
			@endif
			</div>
		</div>
	</div>
</section>

<!--问题评论模态框-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header topar">
	     <div class="topar_title">
	       	 <h5 class="modal-title" id="exampleModalLabel" v-text='count'></h5>
	     </div>
      </div>
      <!--问题评论-->
      <div class="modal-body">
      	<div class="row" style='padding:10px 20px' id='plqy'>
      		<div class="col-md-12 pl_bottom" v-for='todo in todos'>
	  			<div class="col-md-12 pl">
	  				<img :src="todo.user.avatar" alt="" class='pl_img'>
	  				<span v-text='todo.user.name'></span>
	  				<span class='ago' v-text='todo.createTime'></span>
	  			</div>
	  			<div class="col-md-12 pl" v-text='todo.body'>
	  				<!--评论内容-->
	  			</div>
  		  	</div>
      	</div>
      </div>
      <div class="modal-footer">
		 <div class="input-group">
		      <input type="text" class="form-control" placeholder="写下你的评论..." minlength='4' id='pl_mess'>
		      <span class="input-group-btn">
		        <button class="btn btn-default pl_bt1" type="button" id='pl_bt' disabled>评论</button>
		      </span>
	     </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')

<!--关注用户-->
<script type="text/javascript">
	
	var followed_id = {!!$question->user->id!!}

	$.ajax({
		url:'/check/follow/user',
		data:{followed_id:followed_id},
		type:'get',
		success:function(mes){
		
			if(mes=='true'){
				$('#foll_btn').addClass('grey');
				$('#foll_btn').html('已关注');
			}else{
				$('#foll_btn').removeClass('grey');
				$('#foll_btn').html('关注');
			}
		}
	})

	
	$('#foll_btn').click(function(){

		$.ajax({

			url:'/follow/user',
			data:{followed_id:followed_id},
			type:'get',
			success:function(mes){

				if(mes.attached>0){
					$('#foll_btn').addClass('grey');
					$('#foll_btn').html('已关注');
				}else{
					$('#foll_btn').removeClass('grey');
					$('#foll_btn').html('关注');
				}
			}
		})
	})

</script>


<!--关注问题-->
<script type="text/javascript">



	var question_id = {!!$question->id!!}

		$.ajax({
			url:'/check/follow/question',
			data:{question_id:question_id},
			type:'get',
			success:function(mes){
				
				if(mes>0){
					$('#fllow').addClass('grey');
					$('#fllow').html('已关注');
				}else{
					$('#fllow').removeClass('grey');
					$('#fllow').html('关注问题');
				}
			}
		})
	
	
	$('#fllow').click(function(){

			var info = $(this);
			$.ajax({
					url:'/follow/question',
					data:{question_id:question_id},
					type:'get',
					success:function(mes){

						if(mes.attached>0){
							info.addClass('grey');
							info.html('已关注');
							info.attr('info',true);
						}else{
							info.removeClass('grey');
							info.html('关注问题');
						}
					}
			});
	})

</script>

<!--答案编辑区-->
<script type="text/javascript">
	$('#cAnswer').click(function(){	
		$('#area').toggle('slow');
	})
</script>

<!--遍历-->
<script type="text/javascript">
	var answers = {!!$answers!!}
	var aa = new Vue({
      el:'#answers',
      data:{
        todos:answers   
      }
 	 })

	var comments = {!!$comments!!}
	var cc = new Vue({
      el:'#exampleModal',
      data:{
        todos:comments,
        count:comments.length+'条评论'   
      }
 	 })
</script>


<!--问题评论-->
<script type="text/javascript">

	$('#pl_mess').bind('input propertychange', function() {  	
    	var comment = $(this).val();

    	if(comment){
    		$('#pl_bt').addClass('pl_bt2');
    		$('#pl_bt').attr({'disabled':false});
    	}else{
    		
    		$('#pl_bt').removeClass('pl_bt2');
    		$('#pl_bt').attr({'disabled':true,'display':'none'});
    	} 
	});

	//评论问题
	$('#pl_bt').click(function(){
		var body = $('#pl_mess').val();

		var commentable_id = {!!$question->id!!};

		$.ajax({

			url:'/comment/question',
			data:{body:body,commentable_id:commentable_id},
			type:'get',
			success:function(mes){

				var aa = `<div class="col-md-12 pl_bottom">
			      			<div class="col-md-12 pl">
			      				<img src="${mes.avatar}" alt="" class='pl_img'>
			      				<span>${mes.name}</span>
			      				<span class='ago'>刚刚</span>
			      			</div>
			      			<div class="col-md-12 pl">
			      				${mes.body}
			      			</div>
			      		  </div>`;

			     $(aa).prependTo('#plqy');  		  
			}
		})
	})

</script>

<!--答案评论-->
<script type="text/javascript">
	//获取答案评论
	$('.answerpl_button').bind('click',function(){

		$(this).parent().next().toggle();
		var aa = $(this).parent().next().css('display');
		var answer_id = $(this).attr('info');
		var ss = $(this).parent().next().children().first().next();

			// //监听加载状态改变  
			// ss.onreadystatechange = completeLoading;  
			// //加载状态为complete时移除loading效果  
			// function completeLoading() {  
			//     if (ss.readyState == "complete") {  
			       
			//     }  
			// }

	
		if(aa=='block'){

			$.ajax({
				url:'/api/answer/comment',
				data:{answer_id:answer_id},
				type:'get',
				success:function(mes){
					ss.prev().children().find('h5').html(mes.length+'条评论');
					console.log(mes.length);
					$(mes).each(function(){
						var to = `
							<div class="col-md-12 pl_bottom">
								<div class="col-md-12 pl">
									<img src="${this.user.avatar}" alt="" draggable="false" class="pl_img"> 
									<span>${this.user.name}</span> 
									<span class="ago">${this.createTime}</span>
								</div> 
								<div class="col-md-12 pl">
									${this.body}
								</div>
								<div class="col-md-12">
									<button class="button-plain col">
									<span class="glyphicon glyphicon-leaf"></span>&nbsp;
										回复
									</button>
								</div>
							</div>
						`;
						

						$(to).prependTo(ss); 
					})		

				}
			})
		}else{
			ss.empty();
		}
	})

	//答案评论创建
	$('.pl_answer').bind('click',function(){

		var body = $(this).parent().prev().val();
		var commentable_id = $(this).attr('info');
		var pl = $(this);
		$.ajax({
			url:'/comment/answer',
			data:{commentable_id:commentable_id,body:body},
			type:'get',
			success:function(mes){

				var aa = `
					<div class="col-md-12 pl_bottom">
						<div class="col-md-12 pl">
							<img src="${mes.avatar}" alt="" draggable="false" class="pl_img"> 
							<span>${mes.name}</span> 
							<span class="ago">${mes.createTime}</span>
						</div> 
						<div class="col-md-12 pl">
							${mes.body}
						</div>
						<div class="col-md-12">
							<button class="button-plain col">
							<span class="glyphicon glyphicon-leaf"></span>&nbsp;
								回复
							</button>
						</div>
					</div>
				`;

				var ss = pl.parent().parent().parent().parent().prev();
				$(aa).prependTo(ss); 
				
			}
		})
	})
</script>

@endsection