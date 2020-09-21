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
            $table->engine = 'InnoDB';
             $table->increments('id');
            $table->string('site_name', 100);
            $table->string('meta_desc', 255);
            $table->string('phone', 30);
            $table->string('email')->unique();
            $table->text('head_code');
            $table->text('footer_code');
            $table->string('site_logo', 100);
            $table->string('site_icon', 100);
            $table->enum('site_name_or_img', ['name', 'img']);
            $table->string('facebook', 255)->default('');
            $table->string('twitter', 255)->default('');
            $table->string('instagram', 255)->default('');
            $table->string('google_plus', 255)->default('');
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
