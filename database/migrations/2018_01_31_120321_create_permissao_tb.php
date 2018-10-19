<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissaoTb extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create(env('DB_PREFIX').'permissao', function(Blueprint $table) {
      $table->engine = 'InnoDB';

      $table->increments('id_permissao');
      $table->integer('crud')->nullable()->comment('0				\n1	Leitura			\n2		Cria		\n3	Leitura	Cria		\n4			Altera	\n5	Leitura		Altera	\n6		Cria	Altera	\n7	Leitura	Cria	Altera	\n8				Apaga\n9	Leitura			Apaga\n10		Cria		Apaga\n11	Leitura	Cria		Apaga\n12			Altera	Apaga\n13	Leitura		Altera	Apaga\n14		Cria	Altera	Apaga\n15	Lei /* comment truncated */ /* /* comment truncated */ /*tura	Cria	Altera	Apaga*/*/');
      $table->integer('updn')->nullable()->comment('0				\n1	DOWN			\n2		UPLOAD		\n3	DOWN	UPLOAD		\n4	DOWN	UPLOAD	ALT-PERMISSAO	\n');
      $table->integer('sts')->default('1')->comment('0_Excluido\n1_Ativo');
      $table->integer('user_id')->unsigned();

      $table->index('user_id','fk_mul_permissao_users1_idx');

      $table->foreign('user_id')
      ->references('id')->on('users');

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
    Schema::drop(env('DB_PREFIX').'permissao');
  }
}
