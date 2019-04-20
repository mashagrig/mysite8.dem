<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSheduleUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('shedule_user', function(Blueprint $table)
		{
			$table->foreign('shedule_id', 'fk_shedule_user_shedule_id')->references('id')->on('shedules')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('user_id', 'fk_shedule_user_user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('shedule_user', function(Blueprint $table)
		{
			$table->dropForeign('fk_shedule_user_shedule_id');
			$table->dropForeign('fk_shedule_user_user_id');
		});
	}

}
