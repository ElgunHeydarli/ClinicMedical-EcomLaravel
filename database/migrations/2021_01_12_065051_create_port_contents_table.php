<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('port_contents', function (Blueprint $table) {
            $table->id();
            $table->boolean('lang')->default(0)->comment('0:az, 1:en, 2:ru');
            $table->string('title');
            $table->string('description');
            $table->string('project_name',200);
            $table->string('image');
            $table->string('image_mob');
            $table->string('url');
            $table->string('color_code',30);
            $table->integer('sort');
            $table->string('slug');
            $table->boolean('status')->default(0)->comment('0:passiv, 1:aktiv');
            $table->softDeletes();
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
        Schema::dropIfExists('port_contents');
    }
}
