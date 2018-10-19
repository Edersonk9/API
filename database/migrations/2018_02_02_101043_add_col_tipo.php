<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColTipo extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('tipo')->default('2')->comment('\n0_root \n1_adm	\n2_user');
            $table->integer('empresa_id')->unsigned()->nullable();
            $table->integer('status')->default('1')->comment('\n0_inativo \n1_ativo	\n2_visualizado');

            $table->index('empresa_id','fk_mul_users_empresas1_idx');

            $table->foreign('empresa_id')->references('id_empresa')->on(env('DB_PREFIX').'empresas');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
