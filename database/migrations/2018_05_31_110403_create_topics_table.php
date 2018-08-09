<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('话题名称');
            $table->string('topic_pic')->comment('话题图片');
            $table->text('desc')->nullable()->comment('话题简介');
            $table->integer('questions_count')->default(0)->comment('话题下问题数量');
            $table->integer('articles_count')->default(0)->comment('话题下文章数量');
            $table->integer('followers_count')->default(0)->comment('关注次数');
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
        Schema::dropIfExists('topics');
    }
}
