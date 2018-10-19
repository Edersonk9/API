<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposTb extends Migration
{
  public function up()
  {
    Schema::create(env('DB_PREFIX').'grupos', function(Blueprint $table) {
      $table->engine = 'InnoDB';

      $table->increments('id_grupo');
      $table->integer('status')->default(1);
      $table->string('grupo', 45);
      $table->integer('empresa_id')->unsigned();

      $table->index('empresa_id','fk_grupos_empresas1_idx');

      $table->foreign('empresa_id')
      ->references('id_empresa')->on(env('DB_PREFIX').'empresas');

      $table->timestamps();

    });
  }

  public function down()
  {
    Schema::drop(env('DB_PREFIX').'grupos');
  }
}
