<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('id_event')->unsigned();
            $table->string('type');
            $table->date('date');
            $table->text('description');
            $table->text('photo');
            $table->timestamps();
        });
        Schema::table('competitions', function($table) {
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
        Schema::drop('competitions');
    }
}
