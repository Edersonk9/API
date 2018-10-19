<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogTb extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
		Schema::create(env('DB_PREFIX').'logs', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->increments('id_log');
		    $table->string('desc', 255)->nullable();
		    $table->integer('grupo_id')->unsigned()->nullable();
		    $table->integer('empresa_id')->unsigned()->nullable();
		    $table->integer('dado_id')->unsigned()->nullable();
		    $table->integer('endereco_id')->unsigned()->nullable();
		    $table->integer('user_id')->unsigned();
		    $table->integer('permissao_id')->unsigned()->nullable();

		    $table->index('grupo_id','fk_logs_grupos1_idx');
		    $table->index('empresa_id','fk_logs_empresas1_idx');
		    $table->index('dado_id','fk_mul_logs_dados1_idx');
		    $table->index('endereco_id','fk_logs_enderecos1_idx');
		    $table->index('user_id','fk_logs_users2_idx');
		    $table->index('permissao_id','fk_logs_permissao1_idx');

		    $table->foreign('grupo_id')
		        ->references('id_grupo')->on(env('DB_PREFIX').'grupos');

		    $table->foreign('empresa_id')
		        ->references('id_empresa')->on(env('DB_PREFIX').'empresas');

		    $table->foreign('dado_id')
		        ->references('id_dado')->on(env('DB_PREFIX').'dados');

		    $table->foreign('endereco_id')
		        ->references('id_endereco')->on(env('DB_PREFIX').'enderecos');

		    $table->foreign('user_id')
		        ->references('id')->on(env('DB_PREFIX').'users');

		    $table->foreign('permissao_id')
		        ->references('id_permissao')->on(env('DB_PREFIX').'permissao');

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
    Schema::drop(env('DB_PREFIX').'logs');
  }
}
