@extends('layouts.app')

@section('css')
<style type="text/css">
	.same{
		background:#fff;
		padding:20px;
	}

	.xinxi{
		text-align: center;
	}

	.desc{
		padding:15px;
		color:#999;
	}

	.sub{
		padding:10px;
		border-bottom:1px solid #E6E6E6;
	}

	.blue{
		color: #fff;
    	background-color: #0084ff;
	}

	.button{
		margin:0 8px;
		 padding-left:15px;
		 padding-right:15px;
	}

	.grey{
		border-color: #77839c;
    	background-color: #77839c;
	}

	#articles{
		display:none;
	}
	.questionContent{
		border-bottom:1px solid #E6E6E6;
		margin:15px 0;
	}
	.con{
		margin-top:20px;
	}

	.ConTime{
		margin:15px 0;
    	font-size: 14px;
    	color: #8590a6;
	}

	.articles{
		border-bottom:1px solid #E6E6E6;
		margin:15px 0;
		padding:10px 0;
	}

	.articleTitle{
		margin:15px 0;
	}

	.articleContent{
		margin:20px 0;
		color:#8590a6;
	}
</style>
@endsection

@section('content')
	<section class='container'>
		<div class='row' style='min-height:1000px'>
			<div class='col-md-12'>
				<!--话联-->
				<div class='col-md-8 same'>
					<div class='col-md-12'>
						<div class='col-md-2'><a id='qq'>问题</a></div>
						<div class='col-md-2'><a id='aa'>文章</a></div>
					</div>
					<div>
						<div class='col-md-12 same' id='questions'>
							<h2 style='text-align:center'>相关问题</h2>
							@foreach($questions as $question)
							<div class='col-md-12 questionContent'>
								<h4><a href="/question/detail/{{$question->id}}">{{$question->title}}</a></h4>
								<div class='col-md-12 con'>
									<p>{!!$question->body!!}</p>
								</div>
								<div class="col-md-12 ConTime"><span>编辑于 {{$question->created_at}}</span></div>
							</div>
							@endforeach
						</div>
						<div class='col-md-12 same' id='articles'>
							<h2 style='text-align:center'>相关文章</h2>
							@foreach($articles as $article)
								<div class='col-md-12 articles'>
									<h4 class='articleTitle'><a href="/articles/{{$article->id}}">{{$article->title}}</a></h4>
									<div class='col-md-5'>
										<img src="{{$article->bg_img}}" width='200px'>
									</div>
									<div class='col-md-7'>
										<p>作者：{{$article->user->name}}</p>
										<div class='articleContent'>{!!$article->body!!}</div>
										<p>编辑于：{{$article->created_at}}</p>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>

				<!--话题信息-->
				<div class='col-md-4'>
					<div class='col-md-12 same'>
						<div class='col-md-12'>
							<div class='col-md-6'>
								<img src="{{$topic->topic_pic ? $topic->topic_pic : '/upload/topic.jpg'}}" width="80px">
							</div>
							<div class='col-md-6 xinxi'>
								<div>关注量</div>
								<strong>{{$topic->followers_count}}</strong>
							</div>
						</div>
						<div class='col-md-12 desc'>
							<p>描述：{{$topic->desc ? $topic->desc : '暂无描述'}}</p>
						</div>
						<div class="col-md-12 sub" style='text-align:center'>
							<button class="btn btn-default blue button {{Auth::user()->isFollowTopic($topic->id) ? 'grey' : ''}}" id='follow_btn'>
								{{Auth::user()->isFollowTopic($topic->id) ? '已关注' : '关注'}}
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('script')
	<script type="text/javascript">
		$('#follow_btn').click(function(){

			var topics_id = {!!$topic->id!!}

			$.ajax({
		        url:'/follow/topic',
		        data:{topics_id:topics_id},
		        type:'get',
		        success:(mes)=>{
		            console.log(mes);
		            if(mes.attached>0){
		              	$('#follow_btn').addClass('grey');
						$('#follow_btn').html('已关注');
		            }else{
		             	$('#follow_btn').removeClass('grey');
						$('#follow_btn').html('关注');
		            }
		        }
		      })
		})
	</script>
	<script type="text/javascript">
		  $('#aa').click(function(){
		      $('#articles').show('solw');

		      $('#articles').siblings().hide();
		  })

		  $('#qq').click(function(){
		      $('#questions').show('solw');

		      $('#questions').siblings().hide();
		  })
	</script>
@endsection