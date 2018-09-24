<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('comment_author');
            $table->mediumText('comment_email');
            $table->text('comment');
            $table->bigInteger('user_id');
            $table->smallInteger('published');
            $table->integer('article_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('comments', function ($table) {
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['article_id']);
        Schema::dropIfExists('comments');
    }
}
