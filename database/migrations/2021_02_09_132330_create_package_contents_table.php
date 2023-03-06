<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_contents', function (Blueprint $table) {
            $table->id();
            $table->boolean('lang')->default(0)->comment('0:az, 1:en, 2:ru');
            $table->foreignId('cat_id')->constrained('package_categories')->onDelete('cascade');
            $table->string('title', 100);
            $table->string('day', 20);
            $table->integer('price');
            $table->integer('discount')->nullable();
            $table->integer('sort');
            $table->boolean('status')->default(0)->comment('0:passiv, 1:aktiv');
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
        Schema::dropIfExists('package_contents');
    }
}
