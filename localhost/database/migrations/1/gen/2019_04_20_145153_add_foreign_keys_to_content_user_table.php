<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContentUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('content_user', function(Blueprint $table)
		{
			$table->foreign('content_id', 'fk_content_user_content_id')->references('id')->on('contents')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('user_id', 'fk_content_user_user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('content_user', function(Blueprint $table)
		{
			$table->dropForeign('fk_content_user_content_id');
			$table->dropForeign('fk_content_user_user_id');
		});
	}

}
