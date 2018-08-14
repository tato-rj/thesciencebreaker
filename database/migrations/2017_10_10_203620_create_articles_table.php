<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('title_fr')->unique()->nullable();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('description_fr')->nullable();
            $table->string('image_caption', 255)->nullable();
            $table->string('image_credits', 144)->nullable();
            $table->text('content');
            $table->text('content_fr')->nullable();
            $table->float('reading_time');
            $table->string('original_article');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('editor_id');
            $table->string('volume')->nullable();
            $table->string('issue')->nullable();
            $table->string('doi');
            $table->boolean('editor_pick');
            $table->boolean('highlight')->default(0);
            $table->integer('views')->default(0);
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
        Schema::dropIfExists('articles');
    }
}
