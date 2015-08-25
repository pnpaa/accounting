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
		 Role::create([
			'role_id' => 3,
			'role_name' => 'cashier'
		 ]);
		 	 Role::create([
			'role_id' => 4,
			'role_name' => 'auditor'
		 ]);
	}
}