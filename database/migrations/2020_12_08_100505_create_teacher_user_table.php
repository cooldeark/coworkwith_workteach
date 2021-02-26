<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('name');
            $table->string('sex');
            $table->string('birth');
            $table->string('age');
            $table->string('phone');
            $table->string('education')->comment("1:小學 2:國中 3:高中 4:大專院校 5:大學 6:研究所 7博士班");
            $table->string('profession')->comment("因項目太多，請至程式碼查看");
            $table->string('address_main');
            $table->string('address_main_name');
            $table->string('address_sub');
            $table->string('address_sub_name');
            $table->string('habit');
            $table->string('write_position');
            $table->string('teach_position');
            $table->string('teach_experience');
            $table->string('teach_years');
            $table->string('cooperation_school')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_user');
    }
}
