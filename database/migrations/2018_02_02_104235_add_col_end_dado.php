<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColEndDado extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
		    $table->integer('grupo_id')->unsigned()->nullable();
		    $table->integer('dado_id')->unsigned()->nullable();
		    $table->integer('endereco_id')->unsigned()->nullable();

		    $table->index('grupo_id','fk_users_grupos1_idx');
		    $table->index('dado_id','fk_users_dados1_idx');
		    $table->index('endereco_id','fk_users_enderecos1_idx');

		    $table->foreign('grupo_id')
		        ->references('id_grupo')->on(env('DB_PREFIX').'grupos');

		    $table->foreign('dado_id')
		        ->references('id_dado')->on(env('DB_PREFIX').'dados');

		    $table->foreign('endereco_id')
		        ->references('id_endereco')->on(env('DB_PREFIX').'enderecos');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
