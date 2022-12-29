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
            // OK
            $table->string('title')->unique();
            $table->string('title_fr')->unique()->nullable();
            $table->string('slug')->unique();
            // ABSTRACT
            $table->text('description')->nullable();
            $table->text('description_fr')->nullable();
            // COVERS - COVER - COVER_IMAGE
            // https://oap.unige.ch/journals/public/journals/8/
            $table->text('image_path')->nullable();
            // MISSING (ADD ON THE BACKEND)
            $table->string('image_caption', 255)->nullable();
            $table->string('image_credits', 144)->nullable();
            // MISSING (ADD ON THE BACKEND)
            $table->text('content');
            $table->text('content_fr')->nullable();
            // ADD LATER (missing from xml)
            $table->float('reading_time');
            // CITATIONS - CITATION
            $table->text('original_article');
            // section_ref
            $table->unsignedInteger('category_id');
            // MISSING (ADD ON THE BACKEND)
            $table->unsignedInteger('editor_id');
            // issue_identification - VOLUME - NUMBER
            $table->string('volume')->nullable();
            $table->string('issue')->nullable();
            // DOI (ADD https://doi.org/)
            $table->string('doi');
            $table->boolean('editor_pick')->default(0);
            $table->boolean('highlight')->default(0);
            $table->integer('views')->default(0);
            // STAY AS IS
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            // AUTOMATIC DOWNLOAD AND SAVE PDF FROM RICK'S API
        });
    }

    // ADD DOI EDIT ON WEBSITE

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
