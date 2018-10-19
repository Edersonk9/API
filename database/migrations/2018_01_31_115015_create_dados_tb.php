<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDadosTb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create(env('DB_PREFIX').'dados', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->increments('id_dado');
		    $table->string('razao', 200);
		    $table->integer('cnpj')->nullable();
		    $table->integer('telefone')->nullable()->default(null);
		    $table->integer('ie')->nullable();
		    $table->integer('celular')->nullable();
		    $table->integer('status')->default(1);
		    $table->string('img', 255)->nullable();

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
      Schema::drop(env('DB_PREFIX').'dados');
    }
}
