<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weathers', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->comment('日期');
            $table->integer('weather_type_id')->default(1)->comment('类型ID');
            $table->integer('lowest_temperature')->default(0)->comment('最低气温');
            $table->integer('highest_temperature')->default(0)->comment('最高气温');
            $table->string('extra', 50)->nullable()->comment('备注信息');
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
        Schema::dropIfExists('weathers');
    }
}
