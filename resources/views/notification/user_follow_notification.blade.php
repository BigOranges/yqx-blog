@if(!$notification->read_at)
<li class='list-group-item userfollow' info='{{$notification->id}}'>
	<a href='/user/home/{{$notification->data["id"]}}'>{{$notification->data['name']}}</a>关注了你

	<span class="pull-right">{{$notification->created_at->diffForHumans()}}</span>
</li>
@endif
@section('script')
	<script type="text/javascript">
		$('.userfollow').each(function(){

			var li = $(this);
			var id = $(this).attr('info');
			$(this).dblclick(function(){
				
				$.ajax({
				url:'/api/follow',
					data:{user:{{Auth::user()->id}},id:id},
					type:'get',
					success:function(mes){
						li.fadeOut(500);
					}
				});
			});
		});
	</script>
@endsection