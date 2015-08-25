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
			'email'=>'asasdev@pnpaa.com',
			'question_1'=>'1+1?',
			'question_1_key'=>'2',
			'question_2'=>'2+2?',
			'question_2_key'=>'4',
			'work'=>'dev'
		 ]);
		 User::create([
			'role' => 2,
			'username' => 'dumodev',
			'password'=>Hash::make('dumodev'),
			'first_name'=>'dumo',
			'last_name'=>'dev',
			'email'=>'dumodev@pnpaa.com',
			'question_1'=>'1+1?',
			'question_1_key'=>'2',
			'question_2'=>'2+2?',
			'question_2_key'=>'4',
			'work'=>'dev'
		]);
		  User::create([
			'role' => 3,
			'username' => 'wewedev',
			'password'=>Hash::make('wewedev'),
			'first_name'=>'wewe',
			'last_name'=>'dev',
			'email'=>'wewedev@pnpaa.com',
			'question_1'=>'1+1?',
			'question_1_key'=>'2',
			'question_2'=>'2+2?',
			'question_2_key'=>'4',
			'work'=>'dev'
		]);
	  User::create([
			'role' => 4,
			'username' => 'asdev',
			'password'=>Hash::make('asdev'),
			'first_name'=>'asd',
			'last_name'=>'dev',
			'email'=>'asdev@pnpaa.com',
			'question_1'=>'1+1?',
			'question_1_key'=>'2',
			'question_2'=>'2+2?',
			'question_2_key'=>'4',
			'work'=>'dev'
		]);
	}
}