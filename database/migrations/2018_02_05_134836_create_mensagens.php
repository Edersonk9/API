<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensagens extends Migration
{
  public function up()
  {
    Schema::create('rji_mensagens', function(Blueprint $table) {
      $table->engine = 'InnoDB';

      $table->increments('id_mensagem');
      $table->string('titulo', 145);
      $table->integer('status')->default(1);
      $table->string('mensagem', 254)->nullable();
      $table->dateTime('contato')->nullable();
      $table->integer('vendedor_id')->unsigned();
      $table->integer('cliente_id')->unsigned();

      $table->index('vendedor_id','fk_rji_mensagens_rji_vendedores_idx');
      $table->index('cliente_id','fk_rji_mensagens_rji_clientes1_idx');

      $table->foreign('vendedor_id')
      ->references('id_vendedor')->on('rji_vendedores');

      $table->foreign('cliente_id')
      ->references('id_cliente')->on('rji_clientes');

      $table->timestamps();

    });
  }

  public function down()
  {
    Schema::drop('rji_mensagens');
  }
}
