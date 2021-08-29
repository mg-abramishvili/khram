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
            $table->string('theme');
            $table->string('orientation');
            $table->string('title')->nullable();
            $table->string('logo')->nullable();
            $table->string('serial_key')->nullable();
            $table->string('seeder')->nullable();
            $table->string('nta')->nullable();

            $table->string('module_photoalbums')->nullable();
            $table->string('module_photoalbums_sort')->nullable();
            $table->string('module_photoalbums_text')->nullable();
            $table->string('module_photoalbums_parent')->nullable();

            $table->string('module_videoalbums')->nullable();
            $table->string('module_videoalbums_sort')->nullable();
            $table->string('module_videoalbums_text')->nullable();
            $table->string('module_videoalbums_parent')->nullable();

            $table->string('module_news')->nullable();
            $table->string('module_news_sort')->nullable();
            $table->string('module_news_text')->nullable();
            $table->string('module_news_parent')->nullable();

            $table->string('module_routes')->nullable();
            $table->string('module_routes_sort')->nullable();
            $table->string('module_routes_text')->nullable();
            $table->string('module_routes_parent')->nullable();

            $table->string('module_reviews')->nullable();
            $table->string('module_reviews_sort')->nullable();
            $table->string('module_reviews_text')->nullable();
            $table->string('module_reviews_parent')->nullable();

            $table->string('module_vtour')->nullable();
            $table->string('module_vtour_sort')->nullable();
            $table->string('module_vtour_text')->nullable();
            $table->string('module_vtour_parent')->nullable();

            $table->string('module_banner_one')->nullable();
            $table->string('module_banner_two')->nullable();
            $table->string('module_banner_three')->nullable();
            $table->string('module_vi')->nullable();
            $table->string('module_email')->nullable();
            $table->string('module_printer')->nullable();

            $table->string('smtp_host')->nullable();
            $table->string('smtp_port')->nullable();
            $table->string('smtp_sec')->nullable();
            $table->string('smtp_user')->nullable();
            $table->string('smtp_password')->nullable();
            $table->string('email_from')->nullable();
            $table->string('email_to')->nullable();

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
