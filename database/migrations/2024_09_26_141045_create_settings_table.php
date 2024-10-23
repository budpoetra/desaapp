<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name');
            $table->string('app_logo');
            $table->string('home_page_image');
            $table->string('home_page_header_text');
            $table->string('home_page_second_text');
            $table->string('app_logo_footer');
            $table->text('footer_text');
            $table->string('footer_facebook');
            $table->string('footer_instagram');
            $table->string('footer_twitter');
            $table->string('footer_whatsapp');
            $table->text('footer_location');
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
        Schema::dropIfExists('settings');
    }
}
