<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecommendArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommendArticle', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('article_title');
            $table->string('article_summary');
            $table->bigInteger('article_category');
            $table->bigInteger('lession_type')->comment('1:中文 1:英文');
            $table->string('link');
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
        Schema::dropIfExists('recommendArticle');
    }
}
