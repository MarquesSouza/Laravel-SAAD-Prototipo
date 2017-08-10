<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRDCSTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('r_d_c_s', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->longText('descricao');
            $table->boolean('status');
            $table->dateTime('periodo_inicio');
            $table->dateTime('periodo_conclusao');
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
		Schema::drop('r_d_c_s');
	}

}
