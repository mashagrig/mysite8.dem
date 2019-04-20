<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToShedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('shedules', function(Blueprint $table)
		{
			$table->foreign('gym_id', 'fk_shedules_gym_id')->references('id')->on('gyms')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('section_id', 'fk_shedules_section_id')->references('id')->on('sections')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('trainingtime_id', 'fk_shedules_trainingtime_id')->references('id')->on('trainingtimes')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('user_id', 'fk_shedules_user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('shedules', function(Blueprint $table)
		{
			$table->dropForeign('fk_shedules_gym_id');
			$table->dropForeign('fk_shedules_section_id');
			$table->dropForeign('fk_shedules_trainingtime_id');
			$table->dropForeign('fk_shedules_user_id');
		});
	}

}
