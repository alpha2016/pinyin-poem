<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poems', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('poem_type_id')->default(1)->comment('类型id');
            $table->string('author', 20)->default('')->comment('作者');
            $table->string('title', 100)->default('')->comment('题目');
            $table->string('content', 1000)->comment('内容');
            $table->string('description', 1000)->comment('简述');
            $table->integer('admin_id')->comment('最后操作人');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poems');
    }
}
