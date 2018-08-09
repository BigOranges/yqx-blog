<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//创建问题
Route::post('/question/create','QuestionController@create');

//问题详情
Route::get('/question/detail/{id}','QuestionController@index');

//话题
Route::resource('topics','TopicsController');

//答案
Route::resource('answer','AnswerController');

//上传图片
Route::post('/upload/img','UploadController@createimg');

//问题评论创建
Route::get('/comment/question','CommentController@store');

//答案评论创建
Route::get('/comment/answer','CommentController@create');

//文章評論創建
Route::get('/comment/article','CommentController@createArticle');

//答案评论展示
Route::get('/show/commentAns','CommentController@answerComment');


Route::middleware(['auth'])->group(function(){

	Route::get('/follow/question','FollowController@store');

	Route::get('/follow/user','FollowController@folUser');

	Route::get('/like/article','FollowController@likeArticle');

	Route::get('/follow/article','FollowController@followArticle');

	Route::get('/follow/topic','FollowController@followTopic');



});

Route::resource('articles','ArticleController');

//检测是否关注
Route::get('/check/follow/question','FollowController@checkQuestionFollow');

Route::get('/check/follow/user','FollowController@checkUserFollow');

//用户关注通知
Route::get('/notification','UserFollowNotificationController@index');


