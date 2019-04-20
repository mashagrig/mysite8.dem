<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonalinfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('personalinfos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('login')->nullable();
			$table->string('name')->nullable();
			$table->string('surname')->nullable();
			$table->string('middle_name')->nullable();
			$table->string('email')->nullable();
			$table->string('telephone')->nullable();
			$table->date('birthdate')->nullable();
			$table->string('text')->nullable();
            $table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('personalinfos');
	}

}
