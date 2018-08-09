<?php

use Illuminate\Http\Request;
use App\Comment;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//获取答案的评论
Route::middleware('api')->get('/answer/comment', function (Request $request) {

    $r =   App\Answer::with('comments','comments.user')->where('id',$request->get('answer_id'))->first();

   	$comments = new comment();

    foreach($r->comments as $k=>$com){

            $com->createTime = date('Y-m-d',strtotime($com->created_at));

            $comments->$k = $com;
            
     }

     return $comments;

});


Route::group(['namespace'=>'api'],function(){

	Route::post('verificationcodes','VerificationCodesController@store');
});

//关注通知
Route::middleware('api')->get('/follow', function (Request $request) {
	
	$user = App\User::findOrFail($request->get('user'));

	foreach($user->unreadNotifications as $notification){

		if($request->get('id')==$notification->id){

			$notification->markAsRead();

		}
	}

});
