<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendedores extends Migration
{
  public function up()
  {
		Schema::create('rji_vendedores', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->increments('id_vendedor');
		    $table->string('vendedor', 45)->nullable();
		    $table->integer('status')->default(1);
		    $table->integer('empresa_id')->unsigned();
		    $table->integer('users_id')->unsigned();

		    $table->index('empresa_id','fk_rji_vendedores_rji_empresas1_idx');
		    $table->index('users_id','fk_rji_vendedores_users1_idx');

		    $table->foreign('empresa_id')
		        ->references('id_empresa')->on('rji_empresas');
		
		    $table->foreign('users_id')
		        ->references('id')->on('users');

		    $table->timestamps();

		});
  }

  public function down()
  {
    Schema::drop('rji_vendedores');
  }
}
