<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->uniqid();
            $table->string('thumbnail');
            $table->string('source');
            $table->string('video')->nullable();
            $table->string('yt_link')->nullable();
            $table->string('type')->nullable();
            $table->text('body');
            $table->boolean('is_popular')->default(false);
            $table->foreignId('user_id');
            $table->foreignId('playlist_video_id')->nullable();
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
        Schema::dropIfExists('videos');
    }
}
