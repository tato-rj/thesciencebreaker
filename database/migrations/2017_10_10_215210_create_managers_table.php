<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('slug')->slug();
            $table->string('email')->unique();
            $table->unsignedInteger('division_id');
            $table->string('position')->nullable();
            $table->text('biography')->nullable();
            $table->string('research_institute');
            $table->string('image_path')->nullable();
            $table->boolean('is_editor');
            $table->boolean('is_alumni')->default(false);
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
        Schema::dropIfExists('managers');
    }
}
