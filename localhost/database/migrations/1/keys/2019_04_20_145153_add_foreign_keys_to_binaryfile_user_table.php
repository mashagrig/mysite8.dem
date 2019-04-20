<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBinaryfileUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('binaryfile_user', function(Blueprint $table)
		{
			$table->foreign('binaryfile_id', 'fk_binaryfile_user_binaryfile_id')->references('id')->on('binaryfiles')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('user_id', 'fk_binaryfile_user_user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('binaryfile_user', function(Blueprint $table)
		{
			$table->dropForeign('fk_binaryfile_user_binaryfile_id');
			$table->dropForeign('fk_binaryfile_user_user_id');
		});
	}

}
