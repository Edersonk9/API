<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertas extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create(env('DB_PREFIX').'alertas', function(Blueprint $table) {
      $table->engine = 'InnoDB';

      $table->increments('id_alerta');
      $table->string('alerta', 45);
      $table->string('desc', 245)->nullable();
      $table->string('link', 245)->nullable();
      $table->integer('status')->default('1')->comment('\n0_inativo \n1_ativo	\n2_visualizado');
      $table->integer('user_id')->unsigned();

      $table->index('user_id','fk_alertas_users1_idx');

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
    Schema::drop(env('DB_PREFIX').'alertas');
  }
}
