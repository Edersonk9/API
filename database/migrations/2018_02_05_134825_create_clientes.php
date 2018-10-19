<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientes extends Migration
{
  public function up()
  {
		Schema::create('rji_clientes', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->increments('id_cliente');
		    $table->string('cliente', 190)->nullable();
		    $table->integer('status')->default(1);
		    $table->string('email', 195)->nullable();
		    $table->integer('empresa_id')->unsigned();

		    $table->index('empresa_id','fk_rji_clientes_rji_empresas1_idx');

		    $table->foreign('empresa_id')
		        ->references('id_empresa')->on('rji_empresas');

		    $table->timestamps();

		});
  }
  public function down()
  {
    Schema::drop('rji_clientes');
  }
}
