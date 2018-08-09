@extends('layouts.app')

@section('css')
<style type="text/css">
	body{
		background:#FFF;

	}

	#con{
		width:690px;
		min-height:1000px;
	}

	.titImg{
		display: block;
    	margin: 0 auto 0;
    	width: 690px;
    	
	}

	.title{
		font-weight: 600;
	    font-synthesis: style;
	    font-size: 24px;
	    line-height: 1.22;
	    margin: 24px 0;
	}

	.popvor{
		padding:0px;
	}

	.zuozhe{
		color: inherit;
    	text-decoration: none;
        font-weight: 600;
        font-size: 12px;
	}

	.text{
		margin-top: 20px;
		word-break: break-word;
    	line-height: 1.6;
	}

	.conTime{
		padding: 16px 0;
		font-size:13px;
		color:#8590a6;
	}

	.topiclist{
		
    	padding: 10px 0;
	}

	.topic{
		position: relative;
	    display: inline-block;
	    height: 30px;
	    padding: 0 12px;
	    font-size: 14px;
	    line-height: 30px;
	    color: #0084ff;
	    vertical-align:top;
	    border-radius: 100px;
	    background: rgba(0,132,255,.1);
	    margin-top:5px;
	    margin-right:10px;
	}

	#bot{
		position: relative;
	}

	.botCon{
		display: flex;
    	-webkit-box-align: center;
        align-items: center;
    	padding: 10px 20px;
    	margin: 0  -10px;
    	color: #646464;
    
    	clear: both;
	}

	.like{
		display: inline-block;
	    font-size: 14px;
	    line-height: 32px;
	    text-align: center;
	    cursor: pointer;
	    border: 1px solid #E5F2FF;
	    border-radius: 3px;
	    padding: 0 10px;
	    color: #0084ff;
	    background: rgba(0,132,255,.1);
	    border-color: transparent;
	}

	.button-plain{
		height: auto;
	    padding: 0;
	    line-height: inherit;
	    background-color: transparent;
	    border: none;
	    border-radius: 
	    color:#8590A6;
	    margin-left:20px;
	}

	.tobar{
		margin: 0 20px;
		padding: 0;
		border-radius: 2px;
		border-bottom: 1px solid #f6f6f6;
		display: flex;
    	-webkit-box-pack: justify;
   	 	justify-content: space-between;
    	-webkit-box-align: center;
        align-items: center;
   	 	height: 50px;
	}

	h2{
		display: inline-block;
    	font-size: 15px;
   		font-weight: 600;
    	color: #1a1a1a;
	}

	.edit{
		padding:10px 20px;
		border-bottom: 1px solid #f6f6f6;
    
	}

	.edit_con{
		margin-bottom:10px;
	}

	#article_pl{
		/*display:none;*/
	}

	.col{
		color: #0084ff;
	}
</style>
@endsection

@section('content')
	<section class='container' id='con'>
		<div class="row" >
			<div class='col-md-12'>
				<img src="{{$article->bg_img}}" class='titImg'>
			</div>
			<div class='col-md-12'>
				<h1 class='title'>{{$article->title}}</h1>
				<div class='author'>
					<div class="authorInfo">
						<div class='col-md-1 popvor' style='padding:0px'>
							<img src="{{$article->user->avatar}}" width='38px' class='img-circle'>
						</div>
						<div class='col-md-11 popvor'>
							<div class='col-md-12 popvor'>
								<a href="" class='zuozhe'>{{$article->user->name}}</a>
							</div>
							<div class='col-md-12 popvor' >
								<p>曾经我也是颗痴情的种子，结果下了场雨淹死了</p>
							</div>
						</div>
					</div>
					<div class='col-md-12 popvor text'>
						{!!$article->body!!}
					</div>
					<div class='col-md-12 conTime'>
						發佈于 {{$article->created_at}}
					</div>
					<div class='col-md-12 popvor'>
						<div class="topiclist">
							@foreach($article->topics as $topic)
							<div class="topic">
								{{$topic->name}}
							</div>
							@endforeach
						</div>
					</div>
					<div class='col-md-12 popvor' id='bot'>
						<div class='botCon'>
							<button class="like VoteButton">
								<span class="glyphicon glyphicon-thumbs-up" style="margin-right: 10px;">
								</span>
								<span id="like_count">{{$article->likes_count}}</span>
							</button>

							<button class="button-plain {{Auth::user()->isFollowArticle($article->id) ? 'col' : ''}}" data-toggle="modal"  id='follow'>
								<span class="glyphicon glyphicon-star"></span>
								<span id='followText'>{{Auth::user()->isFollowArticle($article->id) ? '已收藏' : '收藏'}}</span>
							</button>

							<button class="button-plain" data-toggle="modal" data-target="#exampleModal">
								<span class="glyphicon glyphicon-trash"></span>
								<span>刪除</span>
							</button>
						</div>
					</div>
					<div class='col-md-12 popvor'>
						<div class='tobar'>
							<h2 id='pl_count'>{{$article->comments_count}}评论</h2>
						</div>
						<div class='edit'>
							<div class="input-group">
						      <input type="text" class="form-control" placeholder="寫下你的評論。。。" id='body' required>
						      <span class="input-group-btn">
						        <button class="btn btn-default" type="submit" id='button'>評論</button>
						      </span>
						    </div>
						</div>
					
						<div id='article_pl'>
							@foreach($r->comments as $comment)
							<div class="edit">
								<div class='edit_con'>
									<img src="{{$comment->user->avatar}}" width='24px'>
									<span>{{$comment->user->name}}</span>
									<span style='float:right'>{{date('Y-m-d',strtotime($comment->created_at))}}</span>
								</div>
								<div class='edit_con'>
									<p>{{$comment->body}}</p>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('script')
	<script type="text/javascript">

		$('#button').click(function(){

			var body = $('#body').val();
			var commentable_id = {!!$article->id!!}
			var count = {!!$article->comments_count!!}

			if(body){
				$.ajax({
					url:'/comment/article',
					data:{body:body,commentable_id:commentable_id},
					type:'get',
					success:function(mes){

						var aa = `
							<div class="edit">
								<div class='edit_con'>
									<img src="${mes.avatar}" width='24px'>
									<span>${mes.name}</span>
									<span style="float:right">${mes.createTime}</span>
								</div>
								<div class='edit_con'>
									<p>${mes.body}</p>
								</div>
							</div>
						`;

						$(aa).prependTo('#article_pl');
						count++;
						$('#pl_count').html(count+'评论'); 
					}
				})
			}else{
				alert('請填寫此字段');
			}
		})


		$('#look').click(function(){

			$('#article_pl').toggle('slow');
		})
	</script>

	<!--给文章点赞-->
	<script type="text/javascript">
		
		$('.like').click(function(){
			
			var article_id = {!!$article->id!!}
			var count = $('#like_count').html();

			$.ajax({
				url:'/like/article',
				data:{article_id:article_id},
				type:'get',
				success:function(mes){

					if(mes.attached>0){
						count++;
						$('#like_count').html(count);
					}else{
						count--;
						$('#like_count').html(count);
					}
				}
			})
		})
	</script>

	<!--文章收藏-->
	<script type="text/javascript">
		$('#follow').click(function(){

			var article_id = {!!$article->id!!}
			$.ajax({
				url:'/follow/article',
				data:{article_id:article_id},
				type:'get',
				success:function(mes){
					console.log(mes);

					if(mes.attached>0){
						$('#followText').html('已收藏');
						$('#follow').addClass('col');
					}else{
						$('#followText').html('收藏');
						$('#follow').removeClass('col');
					}
				}
			})
		})
	</script>
@endsection