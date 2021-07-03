<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToStudentUser03 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_user', function (Blueprint $table) {
            $table->timestamp('memberValidTime')->comment('預設為null，為一開始有註冊的user可以無限使用，後續使用者由admin決定日期')->nullable();
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
