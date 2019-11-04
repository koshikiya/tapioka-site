<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TapiokaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tapiokas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('store_name');
            $table->string('item_name');
            $table->string('drink_taste',10);
            $table->string('drink_comment');
            $table->string('photo')->nullable();
            $table->string('tapioka_taste');
            $table->string('tapioka_size');
            $table->string('tapioka_quantity',10);
            $table->string('tapioka_comment');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tapiokas');
    }
}
