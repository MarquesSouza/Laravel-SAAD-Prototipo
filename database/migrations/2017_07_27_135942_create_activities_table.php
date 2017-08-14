<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activities', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->longText('descricao');
            $table->boolean('status');
            $table->double('carga_horaria');
            $table->double('carga_horaria_anual');
            $table->double('carga_horaria_semanal');
            $table->string('ambiente_recomendado');
            $table->string('ambiente_eventual');
            $table->integer('fator_mutiplicador');

            $table->integer('id_tipoAtivity')->unsigned();
            $table->foreign('id_tipoAtivity')->references('id')->on('type_activities')->onDelete('cascade');

            $table->integer('id_nucleo')->unsigned();
            $table->foreign('id_nucleo')->references('id')->on('cores')->onDelete('cascade');

            $table->integer('id_ambientes')->unsigned();
            $table->foreign('id_ambientes')->references('id')->on('ambients')->onDelete('cascade');


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
		Schema::drop('activities');
	}

}
