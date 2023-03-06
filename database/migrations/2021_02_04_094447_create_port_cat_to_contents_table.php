<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortCatToContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('port_cat_to_contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('port_category_id')->constrained('port_categories')->onDelete('cascade');
            $table->foreignId('port_content_id')->constrained('port_contents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('port_cat_to_contents');
    }
}
