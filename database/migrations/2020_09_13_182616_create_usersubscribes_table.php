<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersubscribesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usersubscribes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
             $table->increments('id');
            $table->string('amount');
            $table->timestamp('validuntil')->nullable();
            $table->Integer('user_id')->unsigned();
            $table->timestamps();
             $table->foreign('user_id')->references('id')->on('users')
           ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usersubscribes');
    }
}
