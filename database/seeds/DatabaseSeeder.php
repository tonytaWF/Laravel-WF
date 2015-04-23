<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User as User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//Model::unguard();

		$this->call('UserTableSeeder');
	}

}


class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::truncate();

		User::Create([
			'email' => 'tony.ta@widerfunnel.com',
			'password' => Hash::make('password'),
			'name' => 'Tony Ta',
			'status' => 1
		]);

		// $this->call('UserTableSeeder');
	}

}