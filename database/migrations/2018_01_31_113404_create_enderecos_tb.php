<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTb extends Migration
{
  /**
  * Run the migrations. env('DB_PREFIX'),
  *
  * @return void
  */
  public function up()
  {
    Schema::create(env('DB_PREFIX').'enderecos', function(Blueprint $table) {
      $table->engine = 'InnoDB';

      $table->increments('id_endereco');
      $table->string('logradouro', 150);
      $table->integer('cep')->nullable()->default(null);
      $table->string('complemento', 100)->nullable()->default(null);
      $table->string('numero', 10);
      $table->string('uf', 20);
      $table->string('cidade', 150);
      $table->string('bairro', 150);

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
		Schema::drop(env('DB_PREFIX').'enderecos');
  }
}
