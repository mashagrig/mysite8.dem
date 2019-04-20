<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shedules', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('date_training')->nullable();
			$table->integer('trainingtime_id')->unsigned()->nullable()->index('fk_shedules_trainingtime_id_idx');
			$table->integer('user_id')->unsigned()->nullable()->index('fk_shedules_user_id_idx');
			$table->integer('section_id')->unsigned()->nullable()->index('fk_shedules_section_id_idx');
			$table->integer('gym_id')->unsigned()->nullable()->index('fk_shedules_gim_id_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('shedules');
	}

}
