<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('config', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('value');
			$table->rememberToken();
			$table->timestamps();
		});

		DB::table('config')
			->insert([
				'name' => 'maintenance',
				'value' => 'off'
			]);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('config');
	}
}
