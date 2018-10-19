<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSession extends Migration
{
    public function up()
    {
		Schema::create('rji_session', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->increments('id_session');
		    $table->string('token', 45);
		    $table->integer('user_id')->unsigned();

		    $table->index('user_id','fk_rji_session_rji_users1_idx');

		    $table->foreign('user_id')
		        ->references('id')->on('rji_users');

		    $table->timestamps();

		});
    }

    public function down()
    {
		Schema::drop('rji_session');
    }
}
