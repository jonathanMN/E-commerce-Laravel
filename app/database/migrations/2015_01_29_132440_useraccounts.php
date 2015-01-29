<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Useraccounts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('users')->insert(array(
			'username' 		=> 'atan',
			'password'		=> Hash::make('123456'),
			'email'			=> 'jonathan.narzo@gmail.com',
			'remember_token'=> '',
			'created_at' 	=> date('Y-m-d H:m:s'),
			'updated_at' 	=> date('Y-m-d H:m:s')
		));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
