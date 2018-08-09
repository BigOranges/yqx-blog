@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">消息通知</div>
    
                <div class="panel-body">
                       <ul class='list-group'>
                   @foreach(Auth::user()->notifications as $notification)
                        @include('notification.'.snake_case(class_basename($notification->type)))
                   @endforeach
                       </ul> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection