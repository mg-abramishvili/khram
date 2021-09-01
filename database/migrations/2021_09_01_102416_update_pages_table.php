<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePagesTable extends Migration
{
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->text('text2')->nullable();
            $table->text('text3')->nullable();
            $table->text('text4')->nullable();
            $table->text('text5')->nullable();
            $table->text('text6')->nullable();
            $table->text('text7')->nullable();
            $table->text('text8')->nullable();
            $table->text('text9')->nullable();
            $table->text('text10')->nullable();
            $table->text('text11')->nullable();
            $table->text('text12')->nullable();
            $table->text('text13')->nullable();
            $table->text('text14')->nullable();
            $table->text('text15')->nullable();
        });
    }

    public function down()
    {
        //
    }
}
