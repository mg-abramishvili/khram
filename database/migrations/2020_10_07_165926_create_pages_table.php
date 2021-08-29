<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text')->nullable();
            $table->string('image')->nullable();
            $table->string('image_as_icon')->default('0');
            $table->string('video')->nullable();
            $table->string('pdf')->nullable();
            $table->string('excel')->nullable();
            $table->string('iframe')->nullable();
            $table->longtext('gallery')->nullable();
            $table->string('parent_id')->nullable();
            $table->string('sort')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
