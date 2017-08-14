<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('id_activity')->unsigned();
            $table->foreign('id_activity')->references('id')->on('activities')->onDelete('cascade');

            $table->integer('id_rdc')->unsigned();
            $table->foreign('id_rdc')->references('id')->on('r_d_c_s')->onDelete('cascade');

            $table->integer('id_allocation')->unsigned();
            $table->foreign('id_allocation')->references('id')->on('allocations')->onDelete('cascade');

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
		Schema::drop('tasks');
	}

}
