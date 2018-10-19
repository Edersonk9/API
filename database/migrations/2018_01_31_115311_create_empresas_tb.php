<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTb extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
		Schema::create(env('DB_PREFIX').'empresas', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->increments('id_empresa');
		    $table->string('empresa', 200);
		    $table->integer('cod_vip')->nullable()->comment('GRUPO_SOITIC');
		    $table->integer('status')->default('1')->comment('0 = inativo\n1 = ativo');
		    $table->integer('endereco_id')->unsigned();
		    $table->integer('dado_id')->unsigned();

		    $table->index('endereco_id','fk_empresas_enderecos1_idx');
		    $table->index('dado_id','fk_empresas_dados1_idx');

		    $table->foreign('endereco_id')
		        ->references('id_endereco')->on(env('DB_PREFIX').'enderecos');

		    $table->foreign('dado_id')
		        ->references('id_dado')->on(env('DB_PREFIX').'dados');

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
    Schema::drop(env('DB_PREFIX').'empresas');
  }
}
