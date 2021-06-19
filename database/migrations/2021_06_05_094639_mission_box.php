<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MissionBox extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_box', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mission_name');
            $table->string('mission_description');
            $table->bigInteger('bonus_score');
            $table->bigInteger('lession_type')->comment('1:中文課程 2:英文課程')->defult('1');
            $table->bigInteger('achieve_category');
            $table->bigInteger('achieve_words');
            $table->bigInteger('level');
            $table->bigInteger('education');
            $table->string('whichTeacherCreate');
            $table->bigInteger('status')->comment('0:未啟用 1:啟用');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mission_box');
    }
}
