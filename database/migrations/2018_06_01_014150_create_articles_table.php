<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('文章标题');
            $table->text('body')->comment('文章内容');
            $table->string('bg_img')->default('')->commit('文章封面');
            $table->integer('comments_count')->default(0)->comment('评论次数');
            $table->integer('followers_count')->default(1)->comment('收藏次数');
            $table->string('likes_count')->default(0)->comment('点赞次数');
            $table->string('dis_count')->default(0)->comment('踩次数');
            $table->string('close_comment')->default('C')->comment('');//关闭评论
            $table->integer('user_id')->unsigned()->comment('用户id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
