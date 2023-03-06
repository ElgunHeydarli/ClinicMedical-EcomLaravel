<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('port_categories', function (Blueprint $table) {
            $table->id();
            $table->boolean('lang')->default(0)->comment('0:az, 1:en, 2:ru');
            $table->string('title',100);
            $table->integer('sort');
            $table->string('slug', 140);
            $table->boolean('status')->default(0)->comment('0:passiv, 1:aktiv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('port_categories');
    }
}
