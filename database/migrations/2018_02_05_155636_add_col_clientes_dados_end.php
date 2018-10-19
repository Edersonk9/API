<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColClientesDadosEnd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('rji_clientes', function(Blueprint $table) {
		    $table->integer('endereco_id')->unsigned();
		    $table->integer('dado_id')->unsigned();

		    $table->index('endereco_id','fk_rji_clientes_rji_enderecos1_idx');
		    $table->index('dado_id','fk_rji_clientes_rji_dados1_idx');

		    $table->foreign('endereco_id')
		        ->references('id_endereco')->on('rji_enderecos');

		    $table->foreign('dado_id')
		        ->references('id_dado')->on('rji_dados');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
