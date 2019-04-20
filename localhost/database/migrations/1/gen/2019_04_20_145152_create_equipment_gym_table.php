<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEquipmentGymTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('equipment_gym', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('gym_id')->unsigned()->nullable()->index('fk_equipment_gym_gym_id_idx');
			$table->integer('equipment_id')->unsigned()->nullable()->index('fk_equipment_gym_equipment_id_idx');
			$table->integer('count_equipment')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('equipment_gym');
	}

}
