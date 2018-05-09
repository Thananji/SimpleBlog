<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->increments('id');
            /*$table->string('heading');
            $table->string('slug')->unique();
            $table->text('description'); */
            $table->string('title')->default();
            $table->text('content')->nullable();
            $table->string('is_published')->default('No');            
            $table->string('image_1')->default('');
            $table->string('thumbnail_1')->default('');
            $table->string('image_2')->nullable();
            $table->string('thumbnail_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('thumbnail_3')->nullable();
            $table->integer('ratings')->default(0);

            $table->integer('created_by')->unsigned();
            $table->integer('category_id')->unsigned();

            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stories');
    }
}
