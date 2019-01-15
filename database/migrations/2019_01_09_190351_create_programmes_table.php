<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programmes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_event')->unsigned();
            $table->text('description');
            $table->text('photo');

            $table->timestamps();
        });
               Schema::table('programmes', function($table) {
       $table->foreign('id_event')->references('id')->on('events');
   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('programmes');
    }
}
