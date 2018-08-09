<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->comment('发起评论用户');
            $table->text('body')->comment('评论内容');

            //一个评论属于一个question 也属于一个answer这种应用场景是多态关联

            $table->unsignedInteger('commentable_id');//定义question_id 还是answer_id
            $table->string('commentable_type');//定义类型 

            //注意这两字段必须前缀一致 都是commentable_
            $table->string('is_hidden')->default('F')->comment('是否屏蔽');
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
        Schema::dropIfExists('comments');
    }
}
