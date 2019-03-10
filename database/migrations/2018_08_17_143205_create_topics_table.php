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
            $table->string('title')->comment('帖子标题');
            $table->text('body')->comment('帖子内容');
            $table->integer('reply_count')->comment('回复总数')->default(0);
            $table->integer('view_count')->comment('查看总数')->default(0);
            $table->integer('order')->comment('排序')->default(0);
            $table->text('excerpt')->comment('文章摘要');
            $table->string('slug')->comment('url');
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
