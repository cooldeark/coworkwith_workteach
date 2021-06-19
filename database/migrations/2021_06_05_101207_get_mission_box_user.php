<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GetMissionBoxUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('get_mission_box_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('who_get_mission');
            $table->string('mission_name');
            $table->string('mission_description');
            $table->bigInteger('bonus_score');
            $table->bigInteger('lession_type')->comment('1:中文課程 2:英文課程');
            $table->bigInteger('achieve_category');
            $table->bigInteger('achieve_words');
            $table->bigInteger('level');
            $table->bigInteger('education');
            $table->string('whichTeacherCreate');
            $table->bigInteger('complete_status')->comment('0:未完成 1:已完成')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('get_mission_box_user');
    }
}
