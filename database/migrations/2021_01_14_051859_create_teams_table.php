<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->boolean('lang')->default(0)->comment('0:az 1:en 2ru');
            $table->string('name_surname',50);
            $table->string('image');
            $table->string('position',150);
            $table->integer('sort');
            $table->boolean('status')->default(0)->comment('0:passiv 1:aktiv');
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
        Schema::dropIfExists('teams');
    }
}
