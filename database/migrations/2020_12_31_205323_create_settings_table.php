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
            $table->boolean('lang_id')->default(0)->comment('0:az 1:en 2:ru');
            $table->string('title', 60);
            $table->string('description', 160);
            $table->string('site_title', 60);
            $table->string('site_description', 160);
            $table->string('contact_title', 60);
            $table->string('contact_description', 160);
            $table->string('about_img');
            $table->string('about_title', 100);
            $table->text('about_description');
            $table->string('address', 100);
            $table->string('tel', 20);
            $table->string('tel2', 20);
            $table->string('email', 100);
            $table->string('facebook');
            $table->string('instagram');
            $table->string('linkedin' );
            $table->string('favicon');
            $table->string('logo');
            $table->string('robots_txt');
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
