<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCardUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('card_user', function(Blueprint $table)
		{
			$table->foreign('card_id', 'fk_card_user_card_id')->references('id')->on('cards')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('user_id', 'fk_card_user_user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('card_user', function(Blueprint $table)
		{
			$table->dropForeign('fk_card_user_card_id');
			$table->dropForeign('fk_card_user_user_id');
		});
	}

}
