<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('login');
			$table->string('password')->unique('password_UNIQUE');
			$table->integer('personalinfo_id')->unsigned()->nullable()->index('fk_users_personalinfos_idx');
			$table->integer('role_id')->unsigned()->nullable()->index('fk_users_roles_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
