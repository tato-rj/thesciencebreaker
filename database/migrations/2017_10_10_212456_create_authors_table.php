<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->increments('id');
            // GIVENNAME
            $table->string('first_name');
            // FAMILYNAME
            $table->string('last_name');
            $table->string('slug')->slug();
            $table->string('email')->unique();
            // BIOGRAPHY
            $table->string('position')->nullable();
            // AFFILIATION
            $table->string('research_institute')->nullable();
            // IGNORE
            $table->string('field_research')->nullable();
            // IGNORE
            $table->string('general_comments')->nullable();
            $table->index(['first_name', 'last_name']);
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
        Schema::dropIfExists('authors');
    }
}
