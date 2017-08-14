<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityPCCsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activity_p_c_cs', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('id_activity')->unsigned();
            $table->foreign('id_activity')->references('id')->on('activities')->onDelete('cascade');

            $table->integer('id_ppc')->unsigned();
            $table->foreign('id_ppc')->references('id')->on('p_p_c_s')->onDelete('cascade');

            $table->boolean('status');
            $table->integer('periodo');
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
		Schema::drop('activity_p_c_cs');
	}

}
