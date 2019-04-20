<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEquipmentGymTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('equipment_gym', function(Blueprint $table)
		{
			$table->foreign('equipment_id', 'fk_equipment_gym_equipment_id')->references('id')->on('equipments')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('gym_id', 'fk_equipment_gym_gym_id')->references('id')->on('gyms')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('equipment_gym', function(Blueprint $table)
		{
			$table->dropForeign('fk_equipment_gym_equipment_id');
			$table->dropForeign('fk_equipment_gym_gym_id');
		});
	}

}
