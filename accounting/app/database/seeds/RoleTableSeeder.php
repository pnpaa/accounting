<?php

class RoleTableSeeder extends Seeder {
	public function run()
	{
	     Role::create([
			'role_id' => 1,
			'role_name' => 'admin'
		 ]);
		 Role::create([
			'role_id' => 2,
			'role_name' => 'alumni'
		]);
	}
}