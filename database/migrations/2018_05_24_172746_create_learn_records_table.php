<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLearnRecordsTable extends Migration
{
    /**
     * Run the migrations.
     * updated_at 来标注是最后学习的时间
     * @return void
     */
    public function up()
    {
        Schema::create('learn_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('用户ID');
            $table->integer('poem_id')->comment('诗歌ID');
            $table->integer('times')->default(1)->comment('学习次数');
            $table->integer('duration')->default(0)->comment('持续时间');
            $table->bigInteger('created_ip')->default(0)->comment('初次学习IP');
            $table->bigInteger('updated_ip')->default(0)->comment('上次学习IP');
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
        Schema::dropIfExists('learn_records');
    }
}
