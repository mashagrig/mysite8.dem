<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContentUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('content_user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('content_id')->unsigned()->nullable()->index('fk_content_user_content_id_idx');
			$table->integer('user_id')->unsigned()->nullable()->index('fk_content_user_user_id_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('content_user');
	}

}
