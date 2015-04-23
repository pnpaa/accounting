<?php

class UserTableSeeder extends Seeder {
	public function run()
	{
	     User::create([
			'role' => 1,
			'username' => 'asasdev',
			'password'=>Hash::make('asasdev'),
			'first_name'=>'asas',
			'last_name'=>'dev',
			'work'=>'dev'
		 ]);
		 User::create([
			'role' => 2,
			'username' => 'dumodev',
			'password'=>Hash::make('dumodev'),
			'first_name'=>'dumo',
			'last_name'=>'dev',
			'work'=>'dev'
		]);
	}
}