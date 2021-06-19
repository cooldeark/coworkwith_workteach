<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToStudentUser01 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_user', function (Blueprint $table) {
            $table->string('member_rate')->comment("1:基礎會員 2: 進階會員 3:白金會員")->default('1');
            $table->string('photo_path')->nullable();//上傳自己大頭貼
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_user', function (Blueprint $table) {
            //
        });
    }
}
