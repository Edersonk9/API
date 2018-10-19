<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDadoEnd extends Migration
{
    public function up()
    {
        Schema::table('rji_vendedores', function (Blueprint $table) {
		    $table->integer('dado_id')->unsigned();
		    $table->integer('endereco_id')->unsigned();

		    $table->index('dado_id','fk_rji_vendedores_rji_dados1_idx');
		    $table->index('endereco_id','fk_rji_vendedores_rji_enderecos1_idx');

		    $table->foreign('dado_id')
		        ->references('id_dado')->on('rji_dados');

		    $table->foreign('endereco_id')
		        ->references('id_endereco')->on('rji_enderecos');
        });
    }

    public function down()
    {
        Schema::table('rji_vendedores', function (Blueprint $table) {
            //
        });
    }
}
